
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .alert {
            padding: 0 20px;
            background-color: rgba(237, 237, 237, 1);
            max-width: 300px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            border-radius: 3px;
            position: absolute;
            right: 243px;
            bottom: -61px;
            
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            font-size: 24px;
            cursor: pointer;
            transition: 0.3s;
            font-weight:500;

        }

        .closebtn:hover {
            color: black;
        }

        .alert h3{
            font-size: 14px;
            padding: 20px 0;
            font-weight:500;
        }

        .alert i{
            font-size: 22px;  
            margin-right: 13px;
        }

        .error{
            color: red;
            border-left: 4px solid red;
        }

        .success{
            color: green;
            border-left: 4px solid green;
        }
    </style>
    <div class="alert success">
        <i class="fa-solid fa-circle-check"></i>
        <h3><?=$_COOKIE['massage']?></h3>
        <p class="closebtn" onclick="this.parentElement.style.display='none';">&times;</p>
    </div>
    <script>
        var alertElement = document.querySelector('.alert');
        setTimeout(function () {
            alertElement.style.display = "none";
        }, 3000)
    </script>