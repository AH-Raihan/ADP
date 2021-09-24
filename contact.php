<?php include('header.php'); ?>
<div class="container">
        <div class="row">
            <div class="col-12 jumbotron my-5 bg-adp ">
                <h3>Send message</h3>
                <form action="">
                    <input type="text" class="form-control my-3" placeholder="your Name">
                    <input type="text" class="form-control my-3" placeholder="subject">
                    <input type="text" class="form-control my-3" placeholder="email">
                    <textarea name="message" class="form-control my-3" id="" cols="30" rows="10"></textarea>
                    <input type="submit" class="btn btn-block btn-light my-3" name="" id="">
                </form>
            </div>
        </div>
    </div>

 <script>
         const scriptURL = 'https://script.google.com/macros/s/AKfycbwKj2124zTsz995mCORk6VgQvF7FEZxjgocJh-NtFT6On__vxNJq0x8ojsGcVp5m9Pg8w/exec'
            const form = document.forms['google-sheet']
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => alert("You have successfully submitted."))
                .catch(error => console.error('Error!', error.message))
            })
   
 
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
<?php include('footer.php'); ?>
