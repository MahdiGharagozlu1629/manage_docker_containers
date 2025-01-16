<?php

namespace App\Services\Implements;

use App\Services\Repositories\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function getAll()
    {

        $output = shell_exec('docker images');

        $result = shell_exec_to_array($output);

        $header = array_shift($result);

        $data = [
            'header' => $header,
            'data' => $result
        ];

        return $data;
    }

    public function remove($reference)
    {
        $correct_reference = str_replace(' ', '/', $reference);

        $image = shell_exec('docker images --filter reference=' . $correct_reference);

        $not_exists_image = empty(shell_exec_to_array($image, false));

        if ($not_exists_image)
            return redirect()->back()->with('status', 'Image not found');

        shell_exec('docker rmi ' . $correct_reference);
    }

    public function add(array $data)
    {
        shell_exec("docker pull {$data['name']}");
    }

    public function dropDown()
    {
        $images = shell_exec('docker image list --format "{{.Repository}}"');

        return shell_exec_to_array($images);
    }
}
