<?php

namespace Core;

class Request
{
    public function http_post_request($post)
    {
        $post = trim($_POST[$post]);
        $post = stripslashes($post);
        $post = htmlspecialchars($post);

        return $post;
    }

    public function http_get_request($get)
    {
        $get = trim($_POST[$get]);
        $get = stripslashes($get);
        $get = htmlspecialchars($get);

        return $get;
    }
}
