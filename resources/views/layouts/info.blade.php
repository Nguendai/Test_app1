 <div class="khoia col-md-3"">
 	<div class="col-md-12 top">
 		<h3>Imformation</h3>
 	</div>
 	<img src="upload/images/abc.jpg" width="40%" alt="product" class="img-circle">
 	<div class="info">
 		<p>Name:<i>{{Auth::user()->name}}</i></p>
 		<p>Position:@if(Auth::user()->level==1)
 			<i>User</i>
 			@else
 			<i>Admin</i>
 			@endif  
 		</p>
 		<p>Email:<i>{{Auth::user()->email}}</i></p>
 	</div>
 </div>