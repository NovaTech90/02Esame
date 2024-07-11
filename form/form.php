<?php

    function storeMessage($name, $email, $message) {
        $new_message = [            
            "name" => $name,
            "email" => $email,
            "message" => $message,
            "received on" => date("Y-m-d H:i:s")
        ];

        foreach ($new_message as $value) {
            if($value == "") {
                return "All fields are required";
            }
        }

        $sanitized_message = array_map(function($item) {
            return htmlspecialchars($item);
        }, $new_message);

        if(filesize("../form/messages.json") == 0) {
            $data_to_save = array($sanitized_message);
        } else {
            $old_records = json_decode(file_get_contents("../form/messages.json"), true);
            array_push($old_records, $sanitized_message);
            $data_to_save = $old_records;
        }
        $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if(!file_put_contents("../form/messages.json", $encoded_data, LOCK_EX)) {
            return "Error storing message, please try again";
        } else {
            return "success";
        }
    }

    function getMessages() {

        return array_reverse(json_decode(file_get_contents("../form/messages.json"), true));
    }