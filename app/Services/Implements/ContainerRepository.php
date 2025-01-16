<?php

namespace App\Services\Implements;

use App\Services\Repositories\ContainerRepositoryInterface;

class ContainerRepository implements ContainerRepositoryInterface
{

    public function getAll()
    {
        $containers = shell_exec('docker container ps --format "table {{.ID}}\t{{.Names}}\t{{.Image}}\t{{.Status}}" -a');
        $result = shell_exec_to_array($containers);

        $header = array_shift($result);

        $data = [
            'header' => $header,
            'data' => $result
        ];

        return $data;
    }

    public function getById($id)
    {
        $output = shell_exec('docker ps --filter "id='.$id.'" --format "table {{.ID}}\t{{.Names}}\t{{.Image}}\t{{.Status}}\t{{.Ports}}" -a');

        $result = shell_exec_to_array($output);

        $header = array_shift($result);

        $data = [
            'header' => $header,
            'data' => $result[0],
            'id' => $id
        ];

        return $data;
    }

    public function stop($id)
    {
        $output = shell_exec('docker ps --filter "id='.$id.'"');

        $result = shell_exec_to_array($output , false);

        if (empty($result))
            return redirect()->back()->with('status' , 'The desired container is Stop');

        shell_exec("docker stop {$id}");
    }

    public function remove($id)
    {
        $container = shell_exec('docker ps --filter "id='.$id.'" -a');
        $not_exists_container = empty(shell_exec_to_array($container , false));

        if ($not_exists_container)
            return redirect()->back()->with('status' , 'The desired container does not exist');

        shell_exec('docker rm '.$id);
    }

    public function add(array $attributes)
    {
        shell_exec("docker run -d -p {$attributes['system_port']}:{$attributes['image_port']} {$attributes['image']}");
    }
}
