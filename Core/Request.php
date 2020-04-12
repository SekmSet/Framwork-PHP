<?php

namespace Core;

class Request
{
    public function getQueryParams(): array
    {
        $post = $_POST;
        return $this->secure_request($post);
    }

    /**
     * @param $post
     * @return mixed
     */
    private function secure_request($post)
    {
        foreach ($post as $key => $value) {
            $post[$key] = htmlspecialchars(stripslashes(trim($value)));
        }
        return $post;
    }

    public function http_get_request()
    {
        $get = $_GET;
        return $this->secure_request($get);
    }
}
