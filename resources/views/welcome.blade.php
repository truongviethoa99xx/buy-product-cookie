<!DOCTYPE html>
<html lang="en">
   <head>
      <title>User Profile</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="#" />
      <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
      <meta name="author" content="#" />
      <!-- Favicon icon -->
      <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon" />
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet" />
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css" />
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css" />
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css" />
      <!-- feather Awesome -->
      <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css" />
      <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css" />
      <link rel="stylesheet" href="{{asset('css/profile.css')}}" />
      <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.css" integrity="sha512-6QxSiaKfNSQmmqwqpTNyhHErr+Bbm8u8HHSiinMEz0uimy9nu7lc/2NaXJiUJj2y4BApd5vgDjSHyLzC8nP6Ng==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style type="text/css">
         img {
         display: block;
         max-width: 100%;
         }
         .preview {
         overflow: hidden;
         width: 160px;
         height: 160px;
         margin: 10px;
         border: 1px solid red;
         }
      </style>
   </head>
   <body>
      <div id="toast"></div>
      <!-- Pre-loader start -->
      <div class="theme-loader">
         <div class="ball-scale">
            <div class="contain">
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
               <div class="ring">
                  <div class="frame"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pre-loader end -->
      <form id="submit">
         <div class="page-body" style=" padding: 20px;">
            <div class="row">
               <div class="col-sm-4">
                  <div class="card text-center" style="min-height: 350px;">
                     <img id="previewimg" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;" />
                     <div id="plussign" style="font-size: 30px;">
                        <i class='bx bxs-edit bx-tada'></i>
                        </i>
                     </div>
                     <input type="file" id="getfile" accept="image/*" style="display: none;" />
                  </div>
               </div>
               <div class="col-sm-8">
                  <div class="card" style="min-height: 350px;">
                     <div class="card-block col-sm-12">
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label">H??? v?? t??n</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nh???p h??? t??n">
                              <span class="messages"></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label">S??? ??i???n tho???i</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="S??? ??i???n tho???i" maxlength="10">
                              <span class="messages"></span>
                           </div>
                        </div>
                        <!-- <div class="form-group row"><label class="col-sm-2 col-form-label">Repeat Password</label><div class="col-sm-10"><input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repeat Password"><span class="messages"></span></div></div> -->
                        <div class="form-group row">
                           <label class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Nh???p email">
                              <span class="messages"></span>
                           </div>
                        </div>
                        <div class="row">
                           <label class="col-sm-2 col-form-label">Gi???i t??nh</label>
                           <div class="col-sm-10">
                              <div class="form-check form-check-inline">
                                 <label class="form-check-label">
                                 <input class="form-check-input" checked type="radio" name="gender" id="gender" value="Nam"> Nam </label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <label class="form-check-label">
                                 <input class="form-check-input" type="radio" name="gender" id="gender" value="N???"> N??? </label>
                              </div>
                              <span class="messages"></span>
                           </div>
                        </div>
                        <div class="form-group row">
                           <!-- <label class="col-sm-2"></label> -->
                           <div class="col-sm-12">
                              <button type="submit" class="btn btn-primary m-b-0" style="float: right;">L??u</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Crop image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="img-container">
                     <div class="row">
                        <div class="col-md-8">
                           <!--  default image where we will set the src via jquery-->
                           <img id="image">
                        </div>
                        <div class="col-md-4">
                           <div class="preview"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="crop">Crop</button>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
      <!-- jquery slimscroll js -->
      <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
      <!-- modernizr js -->
      <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
      <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
      <!-- Validation js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
      <script type="text/javascript" src="..\files\assets\pages\form-validation\validate.js"></script>
      <!-- i18next.min.js -->
      <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
      <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
      <!-- Custom js -->
      <script type="text/javascript" src="..\files\assets\pages\form-validation\form-validation.js"></script>
      <script src="..\files\assets\js\pcoded.min.js"></script>
      <script src="..\files\assets\js\vartical-layout.min.js"></script>
      <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="..\files\assets\js\script.js"></script>
      <script src="{{asset('js/course/profile.js')}}"></script>
      <script src="{{asset('js/course/staff.js')}}"></script>
      <script src="{{asset('js/course/cart.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" integrity="sha512-IlZV3863HqEgMeFLVllRjbNOoh8uVj0kgx0aYxgt4rdBABTZCl/h5MfshHD9BrnVs6Rs9yNN7kUQpzhcLkNmHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         
         function gtag() {
           dataLayer.push(arguments);
         }
         gtag("js", new Date());
         gtag("config", "UA-23581568-13");
      </script>
      <script>
         var bs_modal = $('#modal');
         var image = document.getElementById('image');
         var cropper, reader, file;
         $("body").on("change", "#getfile", function(e) {
           var files = e.target.files;
           console.log(files);
           var filePath = files.item(0).name;
           var fileSize = files.item(0).size;
           var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
           if(!allowedExtensions.exec(filePath)){
               toast({
                   title: `L???i`,
                   message: `Vui l??ng upload c??c file c?? ?????nh d???ng: .jpeg/.jpg/.png/.gif.`,
                   type: `error`,
                   duration: 2000,
               });
             return false;
           } else {
             if(fileSize > 1048576) {
              toast({
                   title: `L???i`,
                   message: `Vui l??ng upload c??c file d?????i 1M`,
                   type: `error`,
                   duration: 2000,
               });
             return false;
             }
           }
           var done = function(url) {
             image.src = url;
             bs_modal.modal('show');
           };
           if (files && files.length > 0) {
             file = files[0];
             if (URL) {
               done(URL.createObjectURL(file));
             } else if (FileReader) {
               reader = new FileReader();
               reader.onload = function(e) {
                 done(reader.result);
               };
               reader.readAsDataURL(file);
             }
           }
         });
         bs_modal.on('shown.bs.modal', function() {
           cropper = new Cropper(image, {
             aspectRatio: 1,
             viewMode: 3,
             preview: '.preview'
           });
         }).on('hidden.bs.modal', function() {
           cropper.destroy();
           cropper = null;
         });
         $("#crop").click(function() {
           canvas = cropper.getCroppedCanvas({
             width: 160,
             height: 160,
           });
           canvas.toBlob(function(blob) {
             url = URL.createObjectURL(blob);
             var reader = new FileReader();
             reader.readAsDataURL(blob);
             reader.onloadend = function() {
               var base64data = reader.result;
               $('#previewimg').attr('src', base64data);
               bs_modal.modal('hide');
               console.log(base64data)

             };
           });
         });
      </script>
      <script>
         function toast({ title = "", message = "", type = "info", duration = 3000 }) {
         const main = document.getElementById("toast");
         if (main) {
          const toast = document.createElement("div");
         
          // Auto remove toast
          const autoRemoveId = setTimeout(function () {
              main.removeChild(toast);
          }, duration + 1000);
         
          // Remove toast when clicked
          toast.onclick = function (e) {
              if (e.target.closest(".toast__close")) {
                  main.removeChild(toast);
                  clearTimeout(autoRemoveId);
              }
          };
         
          const icons = {
              success: "fas fa-check-circle",
              info: "fas fa-info-circle",
              warning: "fas fa-exclamation-circle",
              error: "fas fa-exclamation-circle",
          };
          const icon = icons[type];
          const delay = (duration / 1000).toFixed(2);
         
          toast.classList.add("toast", `toast--${type}`);
          toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
         
          toast.innerHTML = `
                        <div class="toast__icon">
                            <i class="${icon}"></i>
                        </div>
                        <div class="toast__body">
                            <h3 class="toast__title">${title}</h3>
                            <p class="toast__msg">${message}</p>
                        </div>
                        <div class="toast__close">
                            <i class="fas fa-times"></i>
                        </div>
                    `;
          main.appendChild(toast);
         }
         }
         
      </script>
   </body>
</html>