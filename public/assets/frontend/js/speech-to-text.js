class VoiceRecorder {
    constructor() {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        } else {
            alert("getUserMedia is not supported in this browser!");
            return;
        }

        this.mediaRecorder = null;
        this.stream = null;
        this.chunks = [];
        this.isRecording = false;
        this.interval = null;

        this.startRef = $('#start');
        this.stopRef = $('#stop');
        this.cancelRef = $('#cancleBtn');
        this.barsRef = $('.sound-wave-bars');
        this.parentBarsRef = $('.audio-wave');
        this.playerRef = $('#player');
        this.uploadFileRef = $('.uploadFile');
        this.timerRef = $('.timer');
        this.audioInputRef = $('#audioInput');
        this.audioPlayerRef = $('#audioPlayer');
        this.loaderWrapper = $('<div class="loader-wrapper hidden"><div class="loader"></div></div>');

        $('body').append(this.loaderWrapper);

        this.constraints = { audio: true };

        this.startRef.click(() => this.startRecording());
        this.stopRef.click(() => this.stopRecording());
        this.cancelRef.click(() => this.cancelRecording());

        // File upload logic
        this.audioInputRef.on('change', () => this.handleFileUpload());
        this.uploadFileRef.on('click', () => this.triggerFileUpload());
    }

    startRecording() {
        if (this.isRecording || this.audioInputRef.val()) {
            const waveBars = document.querySelector('.sound-wave-bars');
            waveBars.style.display = 'flex';
            return;
        }

        this.clearUpload();
        this.isRecording = true;
        this.toggleLoader(true);

        this.startRef.hide();
        this.stopRef.show();
        this.uploadFileRef.hide();
        this.cancelRef.show();

        this.parentBarsRef.css('height', '100px');
        this.barsRef.css('display', 'flex');

        navigator.mediaDevices.getUserMedia(this.constraints)
            .then(stream => this.handleSuccess(stream))
            .catch(error => this.handleError(error));
    }

    handleSuccess(stream) {
        this.stream = stream;
        this.mediaRecorder = new MediaRecorder(this.stream);
        this.mediaRecorder.ondataavailable = e => this.chunks.push(e.data);
        this.mediaRecorder.onstop = () => this.onMediaRecorderStop();
        this.mediaRecorder.start();
        this.visualizeAudio(stream);
        this.toggleLoader(false);
        this.startTimer();
    }

    stopRecording() {
        if (!this.isRecording) return;
        this.isRecording = false;
        this.stopTimer();
        this.stopRef.hide();
        this.cancelRef.hide();
        this.barsRef.hide();
        this.parentBarsRef.css('height', '0px');
        this.mediaRecorder.stop();
        this.stream.getAudioTracks().forEach(track => track.stop());
        const waveBars = document.querySelector('.sound-wave-bars');
        waveBars.style.display = 'none';
        if (mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            waveBars.style.display = 'none';
        }
        audioElement.src = '';
    }

    onMediaRecorderStop() {
        const blob = new Blob(this.chunks, { 'type': 'audio/wav' });
        const audioURL = window.URL.createObjectURL(blob);
        this.playerRef.attr('src', audioURL).show();
        this.startRef.show();
        this.uploadFileRef.hide(); // Hide upload after recording
        this.chunks = [];

        this.downloadAudio(blob);
    }

    cancelRecording() {
        this.isRecording = false;
        this.stopTimer();
        this.barsRef.hide();
        this.stopRef.hide();
        this.playerRef.hide();
        this.audioPlayerRef.hide();
        this.parentBarsRef.css('height', '0px');
        this.cancelRef.hide();
        this.startRef.show();
        this.uploadFileRef.show(); // Allow upload after cancel

        // Clear chunks and file input
        this.chunks = [];
        this.clearUpload();
    }

    clearUpload() {
        this.audioInputRef.val('');  // Reset the file input
        this.audioPlayerRef.hide().attr('src', '');  // Hide and reset audio player
    }

    toggleLoader(isLoading) {
        if (isLoading) {
            this.loaderWrapper.removeClass('hidden');
        } else {
            this.loaderWrapper.addClass('hidden');
        }
    }

    startTimer() {
        let counter = 0;
        this.timerRef.text('00:00');
        this.interval = setInterval(() => {
            counter++;
            this.timerRef.text(this.formatTime(counter));
        }, 1000);
    }

    stopTimer() {
        clearInterval(this.interval);
        this.timerRef.text('00:00');
    }

    formatTime(seconds) {
        let minutes = Math.floor(seconds / 60);
        let remainingSeconds = seconds % 60;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
        return minutes + ':' + remainingSeconds;
    }

    visualizeAudio(stream) {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const analyser = audioContext.createAnalyser();
        const source = audioContext.createMediaStreamSource(stream);
        source.connect(analyser);
        analyser.fftSize = 256;

        const bufferLength = analyser.frequencyBinCount;
        const dataArray = new Uint8Array(bufferLength);

        const bars = $('.sound-wave-bars');

        const draw = () => {
            analyser.getByteFrequencyData(dataArray);
            bars.each((index, bar) => {
                const value = dataArray[index];
                $(bar).css('height', `${value / 2}px`);
            });

            if (this.isRecording) {
                requestAnimationFrame(draw);
            }
        };

        draw();
    }

    downloadAudio(blob) {
        const url = window.URL.createObjectURL(blob);
        const formData = new FormData();
        formData.append('audio_data', blob, 'recording_' + Date.now() + '.wav');

        // Perform AJAX request
        $.ajax({
            url: '/download-audio',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response.message);
                $('#audio_file').val('');
                $('#audio_file').val(response.file_path);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error uploading audio:', textStatus, errorThrown);
            }
        });
    }

    triggerFileUpload() {
        if (this.isRecording) return;
        this.startRef.hide();
        this.uploadFileRef.hide();
        this.audioInputRef.click();
        this.cancelRef.show();
    }

    handleFileUpload() {
        const file = this.audioInputRef[0].files[0];
        if (file) {
            const fileType = file.type;
            const supportedTypes = ['audio/mp3', 'audio/ogg', 'audio/wav'];

            if (supportedTypes.includes(fileType)) {
                const audioURL = URL.createObjectURL(file);
                this.audioPlayerRef.attr('src', audioURL).show();
                this.audioPlayerRef[0].play();
                this.startRef.hide();
                this.uploadFileRef.hide();

                const formData = new FormData();
                formData.append('audio_data', file, file.name);

                $.ajax({
                    url: '/upload-audio',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: (response) => {
                        console.log('Audio uploaded successfully:', response.message);
                        $('#audio_file').val('');
                        $('#audio_file').val(response.file_path);
                        this.cancelRef.hide();
                        this.startRef.show();
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.error('Error uploading audio:', textStatus, errorThrown);
                        alert('There was an error uploading the file.');
                    }
                });

            } else {
                alert('Unsupported audio format. Please upload an MP3, OGG, or WAV file.');
            }
        }
    }

}

$(document).ready(function() {
    const voiceRecorder = new VoiceRecorder();
    $('#start').show();
     // language selector
     $("#typeSelectors").click(function (e) {
        e.stopPropagation();
        $("#typeItem").slideToggle();
    });
    $("#typeItem li").click(function () {
        const selectedLanguage = $(this).text();
        const selectedLangCode = $(this).data('lang');
        $(".SelectedLanguage").text(selectedLanguage).attr('data-lang', selectedLangCode);
        $("#typeSelectedInput").val(selectedLanguage);
        $("#typeItem").slideUp();
    });
    $(document).click(function () {
        $("#typeItem").slideUp();
    });
});