<!-- footer -->  
<footer id="aa-footer">
<!-- footer bottom -->
<div class="aa-footer-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-footer-top-area">
					<div class="row">
						<div class="col-md-5 col-sm-6">
							<div class="aa-footer-widget">
								<h3>Vải Áo Dài - {{ getFieldCompany('company.name') }}</h3>
								<p class="aa-footer-nav" style="color: #888;">
								{{ getFieldCompany('company.description') }}
								</p>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="aa-footer-widget">
								<div class="aa-footer-widget">
									<h3>Áo dài</h3>
									@php
										$options = array(
											'id' => '',
											'class' => 'aa-footer-nav',
											'sub_id' => '',
											'sub_class' => ''
										);
										echo menu('footer-menu-1', $options);
									@endphp
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
						
						<div class="aa-footer-widget">
							<div class="aa-footer-widget">
								<h3>Trang</h3>
								@php
									$options = array(
										'id' => '',
										'class' => 'aa-footer-nav',
										'sub_id' => '',
										'sub_class' => ''
									);
									echo menu('footer-menu-2', $options);
								@endphp
							</div>
						</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="aa-footer-widget">
								<div class="aa-footer-widget">
									<h3>Liên hệ</h3>
									<address>
										<p> {{ getFieldCompany('company.address') }}</p>
										<p><span class="fa fa-phone"></span>{{ getFieldCompany('company.phone') }}</p>
										<p><span class="fa fa-envelope"></span>{{ getFieldCompany('company.email') }}</p>
									</address>
									<div class="aa-footer-social">
										<a href="{{ getFieldCompany('company.facebook') }}"><span class="fa fa-facebook"></span></a>
										<a href="{{ getFieldCompany('company.twitter') }}"><span class="fa fa-twitter"></span></a>
										<a href="{{ getFieldCompany('company.linkedin') }}"><span class="fa fa-linkedin"></span></a>
										<a href="{{ getFieldCompany('company.googleplus') }}"><span class="fa fa-google-plus"></span></a>
										<a href="{{ getFieldCompany('company.youtube') }}"><span class="fa fa-youtube"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer-bottom -->
<div class="aa-footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="aa-footer-bottom-area">
					<p>Designed by <a href="https://webdepnhatrang.com">KaTiSoft - Webdepnhatrang.com</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>
  <!-- / footer -->