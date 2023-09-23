<footer class="footer-3-2 h-100" style="font-family: 'Poppins', sans-serif">
    <div class="container-xxl mx-auto main">
      <div class="d-flex flex-lg-row flex-column" style="margin-bottom: 5rem">
        <div class="left-col">
          <img src="{{ asset('img/logopemkobjm.png') }}" alt="logo si-aldo">
          <img src="{{ asset('img/si-aldo4.png') }}" alt="logo si-aldo">
          <h5 class="caption-font">
            {{ trans('frontend.aldo_desc') }}.<br class="d-sm-block d-none" />
          </h5>
        </div>
        <div class="right-col">
          <div class="d-flex row gap-lg-0 gap-4 mx-3">
            <div class="col-lg-7">
              <h5 class="title-font">{{ trans('frontend.links') }}</h5>
              <nav class="list-unstyled list-footer d-grid gap-2">
                <li>
                  <a href="https://ciptakarya.pu.go.id/" target="_blank" class="text-decoration-none">Ditjen Ciptakarya</a>
                </li>
                <li>
                  <a href="https://sanitasi.ciptakarya.pu.go.id/" target="_blank" class="text-decoration-none">Dit Sanitasi</a>
                </li>
                <li>
                  <a href="https://banjarmasinkota.go.id/" target="_blank" class="text-decoration-none">Pemko Banjarmasin</a>
                </li>
                <li>
                  <a href="https://pupr.banjarmasinkota.go.id/" target="_blank" class="text-decoration-none">Dinas PUPR Kota Banjarmasin</a>
                </li>
              </nav>
            </div>
            
            <div class="col-lg-5">
              <h5 class="title-font">Support</h5>
              <nav class="list-unstyled list-footer d-grid gap-2">
                <li id="contact-link">
                  <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#contact">Contact Support</a>
                </li>
                <li>
                  <a href="{{ url('/') }}#faq" class="text-decoration-none">FAQ</a>
                </li>
                <li>
                  <a href="https://www.lapor.go.id/instansi/pemerintah-kota-banjarmasin" class="text-decoration-none" target="_blank">Layanan LAPOR !</a>
                </li>
                <li>
                  <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#disclaimer">Disclaimer</a>
                </li>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="mx-auto">
        <div
          class="container-xxl p-0 mx-auto d-flex flex-column-reverse flex-lg-row justify-content-between align-items-center gap-lg-0 gap-3">
          <nav class="text-lg-start text-center credit-font col-md-6">
              <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>
          </nav>
          <div class="d-flex footer-icon align-items-center mb-2 mb-md-0 gap-4">
              <svg class="icon-fill" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M17.0583 1.66667H2.94167C2.78299 1.66446 2.62543 1.69354 2.47798 1.75224C2.33053 1.81093 2.19609 1.8981 2.08234 2.00876C1.96858 2.11942 1.87774 2.2514 1.815 2.39717C1.75226 2.54295 1.71885 2.69965 1.71667 2.85833V17.1417C1.71885 17.3004 1.75226 17.4571 1.815 17.6028C1.87774 17.7486 1.96858 17.8806 2.08234 17.9912C2.19609 18.1019 2.33053 18.1891 2.47798 18.2478C2.62543 18.3065 2.78299 18.3355 2.94167 18.3333H17.0583C17.217 18.3355 17.3746 18.3065 17.522 18.2478C17.6695 18.1891 17.8039 18.1019 17.9177 17.9912C18.0314 17.8806 18.1223 17.7486 18.185 17.6028C18.2478 17.4571 18.2812 17.3004 18.2833 17.1417V2.85833C18.2812 2.69965 18.2478 2.54295 18.185 2.39717C18.1223 2.2514 18.0314 2.11942 17.9177 2.00876C17.8039 1.8981 17.6695 1.81093 17.522 1.75224C17.3746 1.69354 17.217 1.66446 17.0583 1.66667ZM6.74167 15.6167H4.24167V8.11667H6.74167V15.6167ZM5.49167 7.06667C5.14689 7.06667 4.81623 6.9297 4.57244 6.6859C4.32864 6.44211 4.19167 6.11145 4.19167 5.76667C4.19167 5.42189 4.32864 5.09122 4.57244 4.84743C4.81623 4.60363 5.14689 4.46667 5.49167 4.46667C5.67475 4.4459 5.86015 4.46404 6.03574 4.5199C6.21132 4.57576 6.37312 4.66807 6.51056 4.7908C6.64799 4.91353 6.75795 5.0639 6.83323 5.23207C6.90852 5.40024 6.94744 5.58241 6.94744 5.76667C6.94744 5.95092 6.90852 6.13309 6.83323 6.30126C6.75795 6.46943 6.64799 6.61981 6.51056 6.74253C6.37312 6.86526 6.21132 6.95757 6.03574 7.01343C5.86015 7.06929 5.67475 7.08743 5.49167 7.06667ZM15.7583 15.6167H13.2583V11.5917C13.2583 10.5833 12.9 9.925 11.9917 9.925C11.7106 9.92706 11.4368 10.0152 11.2074 10.1776C10.9779 10.3401 10.8037 10.5689 10.7083 10.8333C10.6431 11.0292 10.6149 11.2355 10.625 11.4417V15.6083H8.12501C8.12501 15.6083 8.12501 8.79167 8.12501 8.10833H10.625V9.16667C10.8521 8.77259 11.1824 8.44793 11.5804 8.22767C11.9783 8.0074 12.4288 7.89988 12.8833 7.91667C14.55 7.91667 15.7583 8.99167 15.7583 11.3V15.6167Z"
                  fill="#121212" />
              </svg>
              <svg class="icon-fill" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M17.4167 1.66667H2.58332C2.34021 1.66667 2.10705 1.76325 1.93514 1.93516C1.76323 2.10707 1.66666 2.34022 1.66666 2.58334V17.4167C1.66666 17.5371 1.69037 17.6562 1.73643 17.7675C1.7825 17.8787 1.85002 17.9797 1.93514 18.0649C2.02026 18.15 2.12131 18.2175 2.23253 18.2636C2.34375 18.3096 2.46294 18.3333 2.58332 18.3333H10.5667V11.875H8.39999V9.37501H10.5667V7.50001C10.5218 7.0598 10.5737 6.61511 10.7189 6.19712C10.8641 5.77913 11.099 5.39796 11.407 5.08035C11.7151 4.76274 12.089 4.51637 12.5023 4.35854C12.9157 4.2007 13.3586 4.13522 13.8 4.16667C14.4486 4.16268 15.0969 4.19607 15.7417 4.26667V6.51667H14.4167C13.3667 6.51667 13.1667 7.01667 13.1667 7.74167V9.35001H15.6667L15.3417 11.85H13.1667V18.3333H17.4167C17.537 18.3333 17.6562 18.3096 17.7675 18.2636C17.8787 18.2175 17.9797 18.15 18.0648 18.0649C18.15 17.9797 18.2175 17.8787 18.2635 17.7675C18.3096 17.6562 18.3333 17.5371 18.3333 17.4167V2.58334C18.3333 2.46296 18.3096 2.34376 18.2635 2.23255C18.2175 2.12133 18.15 2.02028 18.0648 1.93516C17.9797 1.85004 17.8787 1.78252 17.7675 1.73645C17.6562 1.69038 17.537 1.66667 17.4167 1.66667Z"
                  fill="#121212" />
              </svg>
              <svg class="icon-stroke" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0-footer-3-2)">
                  <path
                    d="M19.1667 2.5C18.3686 3.0629 17.4851 3.49343 16.55 3.775C16.0481 3.19793 15.3811 2.78891 14.6392 2.60327C13.8973 2.41764 13.1162 2.46433 12.4017 2.73705C11.6872 3.00976 11.0737 3.49534 10.6441 4.1281C10.2146 4.76086 9.98974 5.51028 9.99999 6.275V7.10834C8.53552 7.14631 7.08439 6.82151 5.77584 6.16287C4.46728 5.50424 3.34193 4.5322 2.49999 3.33334C2.49999 3.33334 -0.833338 10.8333 6.66666 14.1667C4.95043 15.3316 2.90596 15.9158 0.833328 15.8333C8.33333 20 17.5 15.8333 17.5 6.25C17.4992 6.01788 17.4769 5.78633 17.4333 5.55834C18.2838 4.71958 18.884 3.6606 19.1667 2.5V2.5Z"
                    stroke="#121212" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                  <clipPath id="clip0-footer-3-2">
                    <rect width="20" height="20" fill="white" />
                  </clipPath>
                </defs>
              </svg>
              <svg class="icon-stroke" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M14.1667 1.66667H5.83334C3.53215 1.66667 1.66667 3.53215 1.66667 5.83334V14.1667C1.66667 16.4679 3.53215 18.3333 5.83334 18.3333H14.1667C16.4679 18.3333 18.3333 16.4679 18.3333 14.1667V5.83334C18.3333 3.53215 16.4679 1.66667 14.1667 1.66667Z"
                  stroke="#121212" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M13.3333 9.47501C13.4362 10.1685 13.3177 10.8769 12.9948 11.4992C12.6719 12.1215 12.161 12.6262 11.5347 12.9414C10.9084 13.2566 10.1987 13.3663 9.50648 13.2549C8.81427 13.1436 8.1748 12.8167 7.67903 12.321C7.18326 11.8252 6.85644 11.1857 6.74505 10.4935C6.63366 9.8013 6.74338 9.09159 7.0586 8.46532C7.37382 7.83905 7.87848 7.32812 8.50082 7.00521C9.12315 6.68229 9.83146 6.56383 10.525 6.66667C11.2324 6.77158 11.8874 7.10123 12.3931 7.60693C12.8988 8.11263 13.2284 8.76757 13.3333 9.47501Z"
                  stroke="#121212" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M14.5833 5.41667H14.5917" stroke="#121212" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" />
              </svg>
          </div>
        </div>
      </div>
    </div>

    @include('components.frontend.modal')
  </footer>