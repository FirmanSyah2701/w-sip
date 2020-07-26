<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Covid Indonesia Terupdate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    h2{
        font-size: 35px;
        font-family:cursive;
        text-align: center;
    }
    table{
        border-collapse: collapse; 
        margin-left: auto;
        margin-right: auto;
    }
    table, th, td {
        border: 1px solid black;
    }
    tr:hover {background-color: #f5f5f5;}
    th{
        background-color: blueviolet;
        color: white;
    } 
    th, td {
        padding: 15px;
        text-align: center;
    }
    p{
        text-align: center;
    }
    footer{
        text-align: center;
        margin-top: 12px;
    }
    button{
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: cornflowerblue; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 15px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
    }
</style>

<body>
    <h2> Data Covid Indonesia Terupdate </h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah positif</th>
                <th>Jumlah sembuh</th>
                <th>Jumlah meninggal</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($data as $covid)
                <tr>
                    <td>{{ ++$i }}.</td>
                    <td>@date($covid->key_as_string)</td>
                    <td>{{ $covid->jumlah_positif->value }}</td>
                    <td>{{ $covid->jumlah_sembuh->value }}</td>
                    <td>{{ $covid->jumlah_meninggal->value }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td>Total positif: {{ $total->jumlah_positif }}</td> 
                <td>Total sembuh: {{ $total->jumlah_sembuh }}</td> 
                <td>Total meninggal: {{ $total->jumlah_meninggal }}</td> 
            </tr>           
        </tfoot>
    </table>
 
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa fa-angle-up"></i>
    </button> 

    <footer>
        <small>
            Copyright by Firman Syah, All right reserved &copy; 2020.    
        </small> 
    </footer>

    <script>
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        } 
    </script>
</body>
</html>