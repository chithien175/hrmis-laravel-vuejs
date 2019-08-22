<div class="social-button">
    <div class="social-button-content">
       <a href="tel:{{ getFieldCompany('company.phone') }}" class="call-icon" rel="nofollow">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          <div class="animated alo-circle"></div>
          <div class="animated alo-circle-fill  "></div>
           <span>Hotline: {{ getFieldCompany('company.phone') }}</span>
        </a>
        <a href="sms:{{ getFieldCompany('company.phone') }}" class="sms">
          <i class="fa fa-weixin" aria-hidden="true"></i>
          <span>SMS: {{ getFieldCompany('company.phone') }}</span>
        </a>
        <a href="{{ getFieldCompany('company.facebook') }}" class="mes">
          <i class="fa fa-facebook-square" aria-hidden="true"></i>
          <span>Nhắn tin Facebook</span>
        </a>
        <a href="http://zalo.me/{{ getFieldCompany('company.zalo') }}" class="zalo">
          <i class="fa fa-commenting-o" aria-hidden="true"></i>
          <span>Zalo: {{ getFieldCompany('company.zalo') }}</span>
        </a>
    </div>
       
    <a class="user-support">
      <i class="fa fa-user" aria-hidden="true"></i>
      <div class="animated alo-circle"></div>
      <div class="animated alo-circle-fill"></div>
    </a>
  </div>