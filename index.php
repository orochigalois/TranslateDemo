<html>

<head>
    <title>自动小说翻译</title>
    <meta http-equiv="content-type" content="txt/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>
    <div id="主体">
        <div id="标题">Demo</div>
        <div id="主题">

            <textarea id="chinesenovel" rows="10" cols="50">
               请在这里随便输入一些中文小说...
            </textarea>
            <div>
            <button onclick="翻译()">Translate</button>
            </div>

            
        </div>
 
        <div class="result deepl"></div>
    </div>
</body>

</html>

<script>
    window.$ = function(selector) {
        return document.querySelector(selector);

    }

    function 翻译() {

        let json = JSON.stringify({
            novel: $('#chinesenovel').value.trim()
        });

        console.log(json);



        // send it out
        let xhr1 = new XMLHttpRequest();
        xhr1.open("POST", "translateDeepL.php");
        xhr1.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        xhr1.send(json);

        xhr1.onload = function() {
            if (xhr1.status != 200) { // HTTP error?
                // handle error
                alert('Error: ' + xhr1.status);
                return;
            }




            // get the response from xhr1.response
            $('.deepl').innerHTML = xhr1.response;
        };


    }
</script>
<style>
    @media screen and (max-width: 1024px) {
        html {
            font-size: 2vw;
            color: #333333;
        }

        body {
            margin: 0;
        }

        #主体 {
            border: 2px solid #333333;
            margin: 6px;
            padding: 6px;
            background: #f8f8f8;
        }

        #标题 {
            font-size: 3rem;
            line-height: 3rem;
            text-align: center;
        }

        #主题 {
            text-align: center;
            margin-top: 6px;
            font-size: 0px;
        }

        #主题 span {
            font-size: 2rem;
            vertical-align: baseline;
            margin-left: 6px;
        }

        #主题 textarea {

        border: #666666 2px solid;
        padding: 1px 0 0 0;
        margin: 0px 20px 0 20px;
        vertical-align: baseline;
        font-size: 1rem;
        background: #f8f8f8;
        color: #333333;
        min-width: 20%;
        }

        #主题 button {
            border: 0;
            padding: 3px 7px 3px 7px;
            margin: 0;
            vertical-align: top;
            font-size: 1.4rem;
            background: #454545;
            color: #efefef;
        }

        .result div {
            margin-top: 6px;
            font-size: 2rem;
            text-align: justify;
        }

        #声明 {
            float: left;
            margin: 0 0 0 6px;
        }

        #声明 p {
            margin: 0 0 3px 3px;
            font-size: 1.4rem;
        }

        #声明文字 {
            display: none;
        }

        #页脚 {
            margin: 6px;
        }

        #页脚 p {
            margin: 3px;
            font-size: 1.4rem;
            text-align: right;
        }

        .链接 {
            color: #666666;
        }

        .图标 {
            height: 1rem;
            width: 1rem;
            vertical-align: top;
            margin-top: 2px;
        }
    }

    @media screen and (min-width: 1024px) {
        html {
            font-size: 1.3vw;
            color: #333333;
        }

        body {
            margin: 0;
        }

        #主体 {
            border: 2px solid #333333;
            margin: 20px;
            padding: 20px;
            background: #f8f8f8;
        }

        #标题 {
            font-size: 1.9rem;
            line-height: 1.9rem;
            text-align: center;
        }

        #主题 {
            text-align: center;
            margin-top: 20px;
            font-size: 0px;
        }

        #主题 span {
            font-size: 1rem;
            vertical-align: baseline;
            margin-left: 20px;
        }

        #主题 textarea {

            border: #666666 2px solid;
            padding: 1px 0 0 0;
            margin: 0px 20px 0 20px;
            vertical-align: baseline;
            font-size: 1rem;
            background: #f8f8f8;
            color: #333333;
            min-width: 20%;
        }

        #主题 button {
            border: 0;
            padding: 5px 15px 5px 15px;
            margin: 20px;
            vertical-align: top;
            font-size: 0.75rem;
            background: #454545;
            color: #efefef;
        }

        .result div {
            margin-top: 20px;
            text-align: justify;
        }

    }
</style>