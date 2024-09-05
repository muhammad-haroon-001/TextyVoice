<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emd\Blog;
use App\Models\Emd\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
  public function index()
  {
    $blogs = Blog::with('image')->get();
    return view('admin.blog.index', compact('blogs'));
  }

  public function create()
  {
    $jsonData = file_get_contents(base_path('./resources/languages/languages.json'));
    $languageData = json_decode($jsonData, true);

    $blogs = Blog::get();
    $params = [
      'blogs' => $blogs,
      'languageData' => $languageData
    ];
    return view('admin.blog.create', $params);
  }

  public function store(Request $request)
  {
      $request->validate([
          'title' => 'required|string|max:255',
          'slug' => 'required|string|max:255|unique:blogs',
          'meta_title' => 'required|string|max:255',
          'meta_description' => 'required|string|max:255',
          'language' => 'required|string|max:10',
          'description' => 'string',
          'parent_id' => 'required|integer',
          'status' => 'required|boolean',
          'image' => 'image|mimes:jpg,jpeg,png'
      ]);
  
      $blog = Blog::create($request->except('image'));
  
      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = Str::random(7) . '.' . $image->getClientOriginalExtension();
  
          // Store original image in the public storage
          $path = $image->storeAs('images/original', $filename, 'public');
  
          // Extract just the filename
          $filename = basename($path);
  
          // Full path to the saved image
          $fullPath = storage_path("app/public/images/original/{$filename}");
  
          if (file_exists($fullPath)) {
              // Ensure directories exist
              $sizes = ['900', '300', '150'];
              foreach ($sizes as $size) {
                  if (!File::exists(storage_path("app/public/images/{$size}"))) {
                      File::makeDirectory(storage_path("app/public/images/{$size}"), 0775, true);
                  }
              }
  
              $img = Image::make($fullPath);
  
              // Resize and save images in different sizes
              $img->resize(900, 900)->save(storage_path("app/public/images/900/{$filename}"));
              $img->resize(300, 300)->save(storage_path("app/public/images/300/{$filename}"));
              $img->resize(150, 150)->save(storage_path("app/public/images/150/{$filename}"));
  
              $media = Media::create([
                  'path' => $filename,  // Store just the filename
                  'dimensions' => json_encode([
                      '900x900' => "images/900/{$filename}",
                      '300x300' => "images/300/{$filename}",
                      '150x150' => "images/150/{$filename}",
                      'original' => "images/original/{$filename}"
                  ])
              ]);
  
              $blog->update(['image_id' => $media->id]);
          } else {
              return redirect()->back()->withErrors(['image' => 'Image could not be processed.']);
          }
      }
  
      return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
  }
  

  public function show(Blog $blog)
  {
    return view('admin.blog.show', compact('blog'));
  }

  public function edit(Blog $blog)
  {
    return view('admin.blog.edit', compact('blog'));
  }

  // public function update(Request $request, Blog $blog)
  // {
  //   $request->validate([
  //       'title' => 'required|string|max:255',
  //       'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
  //       'meta_title' => 'required|string|max:255',
  //       'meta_description' => 'required|string|max:255',
  //       'language' => 'required|string|max:10',
  //       'description' => 'string',
  //       'parent_id' => 'required|integer',
  //       'status' => 'required|boolean',
  //       'image' => 'image|mimes:jpg,jpeg,png'
  //   ]);
  //   $blog->update($request->except('image'));
  //   if ($request->hasFile('image')) {
  //       $image = $request->file('image');
  //       $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
  //       $path = $image->storeAs('images/original', $filename, 'public');
  //       $filename = basename($path);
  //       $fullPath = storage_path("app/public/images/original/{$filename}");
  //       if (file_exists($fullPath)) {
  //           $sizes = ['900', '300', '150'];
  //           foreach ($sizes as $size) {
  //               if (!File::exists(storage_path("app/public/images/{$size}"))) {
  //                   File::makeDirectory(storage_path("app/public/images/{$size}"), 0775, true);
  //               }
  //           }
  //           $img = Image::make($fullPath);
  //           $img->resize(900, 900)->save(storage_path("app/public/images/900/{$filename}"));
  //           $img->resize(300, 300)->save(storage_path("app/public/images/300/{$filename}"));
  //           $img->resize(150, 150)->save(storage_path("app/public/images/150/{$filename}"));
  //           if ($blog->image_id) {
  //               $oldMedia = Media::find($blog->image_id);
  //               if ($oldMedia) {
  //                   Storage::delete([
  //                       "public/images/original/{$oldMedia->path}",
  //                       "public/images/900/{$oldMedia->path}",
  //                       "public/images/300/{$oldMedia->path}",
  //                       "public/images/150/{$oldMedia->path}"
  //                   ]);
  //                   $oldMedia->delete();
  //               }
  //           }

  //           $media = Media::create([
  //               'path' => $filename,
  //               'dimensions' => json_encode([
  //                   '900x900' => "images/900/{$filename}",
  //                   '300x300' => "images/300/{$filename}",
  //                   '150x150' => "images/150/{$filename}",
  //                   'original' => "images/original/{$filename}"
  //               ])
  //           ]);

  //           $blog->update(['image_id' => $media->id]);
  //       } else {
  //           return redirect()->back()->withErrors(['image' => 'Image could not be processed.']);
  //       }
  //   }
  //   return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
  // }

  public function update(Request $request, Blog $blog)
{
    // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
        'meta_title' => 'required|string|max:255',
        'meta_description' => 'required|string|max:255',
        'language' => 'required|string|max:10',
        'description' => 'string',
        'parent_id' => 'required|integer',
        'status' => 'required|boolean',
        'image' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    // Update the blog data except the image
    $blog->update($request->except('image'));

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = Str::random(7) . '.' . $image->getClientOriginalExtension();

        // Store original image
        $path = $image->storeAs('images/original', $filename, 'public');
        $filename = basename($path);
        $fullPath = storage_path("app/public/images/original/{$filename}");

        if (file_exists($fullPath)) {
            // Create directories for different sizes if they don't exist
            $sizes = ['900', '300', '150'];
            foreach ($sizes as $size) {
                if (!File::exists(storage_path("app/public/images/{$size}"))) {
                    File::makeDirectory(storage_path("app/public/images/{$size}"), 0775, true);
                }
            }

            // Create different sizes for the image
            $img = Image::make($fullPath);
            $img->resize(900, 900)->save(storage_path("app/public/images/900/{$filename}"));
            $img->resize(300, 300)->save(storage_path("app/public/images/300/{$filename}"));
            $img->resize(150, 150)->save(storage_path("app/public/images/150/{$filename}"));

            // If there is an existing image, delete it
            if ($blog->image_id) {
                $oldMedia = Media::find($blog->image_id);
                if ($oldMedia) {
                    // Delete old image files from storage
                    Storage::delete([
                        "public/images/original/{$oldMedia->path}",
                        "public/images/900/{$oldMedia->path}",
                        "public/images/300/{$oldMedia->path}",
                        "public/images/150/{$oldMedia->path}"
                    ]);

                    // Delete old media record from the database
                    $oldMedia->delete();
                }
            }

            // Create a new media entry
            $media = Media::create([
                'path' => $filename,
                'dimensions' => json_encode([
                    '900x900' => "images/900/{$filename}",
                    '300x300' => "images/300/{$filename}",
                    '150x150' => "images/150/{$filename}",
                    'original' => "images/original/{$filename}"
                ])
            ]);

            // Update the blog with the new image_id
            $blog->update(['image_id' => $media->id]);
        } else {
            return redirect()->back()->withErrors(['image' => 'Image could not be processed.']);
        }
    }

    // If no new image is uploaded, the previous image remains unchanged

    return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
}


  public function destroy(Blog $blog)
  {
    if ($blog->image) {
        $blog->image->delete();
    }
    $blog->delete();
    return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
  }

  public function trash_blog()
  {
    $trashedBlogs = Blog::onlyTrashed()->get();
    return view('admin.blog.trash', compact('trashedBlogs'));
  }
  public function restore_blog($id)
  {
    $blog = Blog::withTrashed()->findOrFail($id);
    $blog->restore();
    if ($blog->image) {
        $blog->image->restore();
    }
    return redirect()->route('Emd.blog.trash')->with('success', 'Blog restored successfully.');
  }
}