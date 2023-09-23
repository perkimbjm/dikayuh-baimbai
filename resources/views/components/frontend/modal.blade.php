<!-- Modal Contact-->
<div class="modal fade" id="contact" tabindex="-1" aria-labelledby="contactLabel" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title" id="contactLabel">{{ trans('frontend.contact') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <h5 class="fw-bold"><img src="{{ asset('img/logopemkobjm.png') }}" alt="logo-pemko" class="float-start mx-2">
          Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarmasin</h5>
          <p style="font-size: 0.8rem;">Jalan Brigjen H. Hasan Basri No. 82 Kec. Banjarmasin Utara, Kota Banjarmasin Kalimantan Selatan - 70124</p>
          <p><strong>E-mail : </strong><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=dinaspupr.banjarmasin@gmail.com" target="_blank">dinaspupr.banjarmasin@gmail.com</a><br>
          <strong>Phone : </strong> 0511 3300197<br>
          <strong>Fax : </strong> 0511 3300097</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Disclaimer-->
<div class="modal fade" id="disclaimer" tabindex="-1" aria-labelledby="disclaimerLabel" aria-hidden="true"  data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="disclaimerLabel">DISCLAIMER</h5>
      </div>
      <div class="modal-body">
        <div>
          <ol class="list-group list-group-numbered" type="1">
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl1') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl2') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl3') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl4') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl5') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl6') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl7') }}</li>
            <li class="list-group-item">{{ trans('frontend.disclaimer.discl8') }}</li>
          </ol>
        </div>
      </div>
      <div class="modal-footer">
         <div class="float-center">
          <input type="checkbox" id="terms" value="1" />
          <label for="terms">{{ trans('frontend.disclaimer.concent') }}</label>
         </div>
         <button type="button" class="btn btn-primary disabled" id="closeBtn" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>