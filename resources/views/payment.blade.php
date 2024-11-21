<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #007bff;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Payment Processing</h1>
        
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-4">
                    <div class="card-header text-center">Obtain Access Token</div>
                    <div class="card-body text-center">
                        <button id="getAccessToken" class="btn btn-primary">Request Access Token</button>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header text-center">Register URLs</div>
                    <div class="card-body text-center">
                        <button id="registerUrlsButton" class="btn btn-primary">Register URLs</button>

                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header text-center">Simulate Transaction</div>
                    <div class="card-body">
                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" id="amount" required>
                            </div>
                            <div class="form-group">
                                <label for="account">Account</label>
                                <input type="text" name="account" class="form-control" id="account" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simulate Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    <script>
        document.getElementById('getAccessToken').addEventListener('click', (event) => {
    event.preventDefault();
    axios.post('/payment/token', {})
        .then((response) => {
            console.log(response.data);
            // Handle success (e.g., display token or success message)
        })
        .catch((error) => {
            console.error(error);
            // Handle error (e.g., display error message)
        });
});

// For the Register URLs button
document.getElementById('registerUrlsButton').addEventListener('click', (event) => {
    event.preventDefault();
    axios.post('/payment/register-urls', {})
        .then((response) => {
            console.log(response.data);
            // Handle success
        })
        .catch((error) => {
            console.error(error);
            // Handle error
        });
});

    </script>
</body>
</html>
