<?php
namespace App\Handlers;

class ImageUploadHandler
{
    // Only upload image files with the following suffixes
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function save($file, $folder, $file_prefix)
    {
        // Build and store folder rules with values ​​like: uploads / images / avatars / 201709/21 /
        // Folder cutting can make searching more efficient.
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // The physical path of the file storage, `public_path ()` gets the physical path of the `public` folder.
        // Values ​​like: / home / vagrant / Code / larabbs / public / uploads / images / avatars / 201709/21 /
        $upload_path = public_path() . '/' . $folder_name;

        // Get the suffix name of the file. Since the suffix name is empty when the picture is pasted from the clipboard, make sure that the suffix always exists
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // Stitch the file name, add the prefix to increase the resolution, the prefix can be the ID of the relevant data model
        // The value is as follows: 1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        // If the uploaded image is not a picture, the operation will be terminated
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // Move the picture to our target storage path
        $file->move($upload_path, $filename);

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

}
