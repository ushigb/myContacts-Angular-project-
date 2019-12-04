<!doctype html>
<html>
    <head>
        <title>My Contacts</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.js"></script>
        <script src="app/app.js"></script>
        <script src="jsServices/user.service.js"></script>
        <script src="jsServices/contacts.service.js"></script>
        <script src="jsServices/login.service.js"></script>
        <script src="components/login.component.js"></script>
        <script src="components/contacts.component.js"></script>
        <script src="js/dateTime.js" type="text/javascript"></script>
        <link rel="stylesheet" href="style/style.css?v=<?= time(); ?>">       
    </head>
    <body>
        
            <div class="row head">
                <div class="col-md-4 rounded">
                    <img src="img/logo.jpg" style="max-height: 150px">                    
                </div>
                <div class="col-md-4 rounded-pill" >
                    <h1 class="title">My Contacts</h1>
                </div>
                
        </div>
        
        <div ng-app="contactsApp">            
            <div class="container log">
                 
                <login></login>
            </div>                  
        </div>
        <footer>
            <div class="row head">
                <div class="col-md-4 leftlogo rounded">
                    <img src="img/logo.jpg" style="max-height: 100px">                    
                </div>
                <div class="col-md-4 rounded">
                                        
                </div>
                <div class="col-md-4 rightlogo rounded">
                    <img src="img/logo.jpg" style="max-height: 100px">                    
                </div>
            </div>
        </footer>
    </body>
    
    
</html>