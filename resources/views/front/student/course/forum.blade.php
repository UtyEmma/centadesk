<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    @push('styles')
        <link rel="stylesheet" href="{{asset('css/forum.css')}}">
    @endpush

    <div class="col-12 d-flex">

         <div class="card card-chat-body border-0 order-0 w-100 px-4 px-md-5 py-3 py-md-4">

             <!-- Chat: Header -->
             <div class="chat-header d-flex justify-content-between align-items-center border-bottom pb-3">
                 <div class="d-flex">
                     <a href="javascript:void(0);" title="">
                         <img class="avatar rounded" src="assets/images/xs/avatar2.jpg" alt="avatar">
                     </a>
                     <div class="ms-3">
                         <h6 class="mb-0">Vanessa Knox</h6>
                         <small class="text-muted">Last seen: 2 hours ago</small>
                     </div>
                 </div>
                 <div class="d-flex">
                     <a class="nav-link py-2 px-3 text-muted d-none d-lg-block" href="javascript:void(0);"><i class="fa fa-camera"></i></a>
                     <a class="nav-link py-2 px-3 text-muted d-none d-lg-block" href="javascript:void(0);"><i class="fa fa-video-camera"></i></a>
                     <a class="nav-link py-2 px-3 text-muted d-none d-lg-block" href="javascript:void(0);"><i class="fa fa-gear"></i></a>
                     <a class="nav-link py-2 px-3 text-muted d-none d-lg-block" href="javascript:void(0);"><i class="fa fa-info-circle"></i></a>
                     <a class="nav-link py-2 px-3 d-block d-lg-none chatlist-toggle" href="#"><i class="fa fa-bars"></i></a>

                     <!-- Mobile menu -->
                     <div class="nav-item list-inline-item d-block d-xl-none">
                         <div class="dropdown">
                             <a class="nav-link text-muted px-0" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fa fa-ellipsis-v"></i>
                             </a>
                             <ul class="dropdown-menu shadow border-0">
                                 <li><a class="dropdown-item" href="#"><i class="fa fa-camera"></i> Share Images</a></li>
                                 <li><a class="dropdown-item" href="#"><i class="fa fa-video-camera"></i> Video Call</a></li>
                                 <li><a class="dropdown-item" href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                 <li><a class="dropdown-item" href="#"><i class="fa fa-info-circle"></i> Info</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Chat: body -->
             <ul class="chat-history list-unstyled mb-0 py-lg-5 py-md-4 py-3 flex-grow-1">
                 <!-- Chat: left -->
                 <li class="mb-3 d-flex flex-row align-items-end">
                     <div class="max-width-70">
                         <div class="user-info mb-1">
                             <img class="avatar sm rounded-circle me-1" src="assets/images/xs/avatar2.jpg" alt="avatar">
                             <span class="text-muted small">10:10 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3">
                             <div class="message"> Hi Aiden, how are you?</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: right -->
                 <li class="mb-3 d-flex flex-row-reverse align-items-end">
                     <div class="max-width-70 text-right">
                         <div class="user-info mb-1">
                             <span class="text-muted small">10:12 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3 bg-primary text-light">
                             <div class="message">Today lessons Informtion?</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: left -->
                 <li class="mb-3 d-flex flex-row align-items-end">
                     <div class="max-width-70">
                         <div class="user-info mb-1">
                             <img class="avatar sm rounded-circle me-1" src="assets/images/xs/avatar2.jpg" alt="avatar">
                             <span class="text-muted small">10:10 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3">
                             <div class="message"> Yes,Components of environment, Types of microbes, their growth and role in environment.</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: left -->
                 <li class="mb-3 d-flex flex-row align-items-end">
                     <div class="max-width-70">
                         <div class="user-info mb-1">
                             <img class="avatar sm rounded-circle me-1" src="assets/images/xs/avatar2.jpg" alt="avatar">
                             <span class="text-muted small">10:10 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3">
                             <div class="message"> Typical generation rate for solid wastes, factors affecting the generation rate</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: right -->
                 <li class="mb-3 d-flex flex-row-reverse align-items-end">
                     <div class="max-width-70 text-right">
                         <div class="user-info mb-1">
                             <span class="text-muted small">10:12 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3 bg-primary text-light">
                             <div class="message">Yes, Orlando Allredy done <br> The actual
                                 distribution of marks in the question paper may vary slightly from above inforamtion</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: left -->
                 <li class="mb-3 d-flex flex-row align-items-end">
                     <div class="max-width-70">
                         <div class="user-info mb-1">
                             <img class="avatar sm rounded-circle me-1" src="assets/images/xs/avatar2.jpg" alt="avatar">
                             <span class="text-muted small">10:10 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3">
                             <div class="message">
                                 <p>Please find attached images</p>
                                 <img class="w120 img-thumbnail" src="assets/images/gallery/1.jpg" alt="" />
                                 <img class="w120 img-thumbnail" src="assets/images/gallery/2.jpg" alt="" />
                             </div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
                 <!-- Chat: right -->
                 <li class="mb-3 d-flex flex-row-reverse align-items-end">
                     <div class="max-width-70 text-right">
                         <div class="user-info mb-1">
                             <span class="text-muted small">10:12 AM, Today</span>
                         </div>
                         <div class="card border-0 p-3 bg-primary text-light">
                             <div class="message">Okay, will check and let you know.</div>
                         </div>
                     </div>
                     <!-- More option -->
                     <div class="btn-group">
                         <a href="#" class="nav-link py-2 px-3 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                         <ul class="dropdown-menu border-0 shadow">
                             <li><a class="dropdown-item" href="#">Edit</a></li>
                             <li><a class="dropdown-item" href="#">Share</a></li>
                             <li><a class="dropdown-item" href="#">Delete</a></li>
                         </ul>
                     </div>
                 </li>
             </ul>

             <!-- Chat: Footer -->
             <div class="chat-message">
                 <textarea  class="form-control" placeholder="Enter text here..."></textarea>
             </div>

         </div>
    </div>
</x-enrolled-course>
