<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('partials.header.navigation')
<div class="text-center">
    <h1>Sign Up</h1>
</div>
<div class="container" id="app">
    <div v-if="!chosen" class="row">
        <div class="col-sm-12 text-center">Are You A:</div>
        <div class="col-sm-12 text-center">
            <button class="btn btn-dark" @click="chooseSignUp('driver')">Driver?</button>
            <button class="btn btn-dark" @click="chooseSignUp('customer')">Customer?</button>
        </div>
    </div>
    <div v-if="driver">
        @include('partials.forms.driver_sign_up')
    </div>
    <div v-if="customer">
        @include('partials.forms.customer_sign_up')
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-12">
            <div v-if="error" class="alert alert-danger" v-cloak>
                @{{message}}
            </div>
            <div v-if="success" class="alert alert-success" v-cloak>
                @{{message}}
            </div>
        </div>
    </div>
</div>
<script src="/js/sign_up.js"></script>
</body>
</html>
