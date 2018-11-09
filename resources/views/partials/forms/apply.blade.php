<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include('partials.header.navigation')
<div class="text-center">
    <h1>Driver Application</h1>
</div>
<div class="container" id="app">
    @include('partials.forms.driver_sign_up')
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
<script src="/js/apply.js"></script>
</body>
</html>
