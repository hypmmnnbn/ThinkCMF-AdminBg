<?php

return [
    'background_url'                 
        => [
        'title'   => 'background', 
        'type'    => 'text',
        'value'   => '',
        "rule"    => [
            "require" => true
        ],
        "message" => [
            "require" => '背景不能为空'
        ],
        'tip'     => '
        点击选择背景图
        <a style="color:red;">*图片尺寸为1920*1080</a>
        <br />
        <input type="hidden" name="url" id="url" value="">
        <img onclick="upload()" title="点击上传" style="max-height:400px;" id="background_url-preview">
        <script>
            function upload(){uploadOneImage("图片上传","#background_url");}
            $("#background_url").click(function(){upload();})
            if($("#background_url").val()){
                $("#background_url-preview").attr("src","/upload/"+$("#background_url").val())
            }
        </script>
        ' 
    ]
]; 