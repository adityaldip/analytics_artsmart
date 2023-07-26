<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-mini" id="main-left-menu" style="transition: all .5s ease-in-out">
    <script>
      var navbarStyle = localStorage.getItem("navbarStyle");
      if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
      }
    </script>
    <div class="d-flex align-items-center">
      <a class="navbar-brand" href="https://artsmart.ai">
        <div class="d-flex align-items-center pt-3 pb-2">
          <img src="/assets/img/logos/as_dark_bg_logo.png" alt="artsmart.ai logo" style="max-width: 90%;" width="60em" class="mx-2">
          <span class="font-sans-serif fs-2 fw-normal" style="color: white;">ART <span class="fw-bold">SMART</span>
            <span class="fs--1 ms-1">AI</span>
          </span>
        </div>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-height pt-3" id="navbarVerticalCollapse" style="background:#111d2c;">
      <div class="settings mb-3">
        <div class="alert card shadow-none p-0" role="alert" style="background:#111d2c;">
          <div class="text-center card-body">
            <h4 class="alert-title fs-0 m-0">Affiliate Program</h4>
            <p class="fs--2 mt-2">Join ArtSmart.ai affiliates and earn 20% cash on all referrals! </p>
            <div class="d-grid">
              <a class="nav-link btn-gradient-animated rounded" href="https://artsmart.ai/affiliate-program/form" role="button" data-bs-toggle aria-expanded="false"> Become an Affiliate </a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-vertical-content scrollbar pt-0" style="padding-bottom: 10rem;background:#111d2c;">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
          <li class="nav-item">
            <a class="nav-link" href="https://artsmart.ai" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512" class="svg-inline--fa fa-grid fa-lg">
                    <path fill="currentColor" d="M0 72C0 49.9 17.9 32 40 32H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V72zM0 232c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V232zM128 392v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40zM160 72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V72zM288 232v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM160 392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V392zM448 72v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM320 232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V232zM448 392v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40z" class></path>
                  </svg>
                </span>
                <span class="nav-link-text ps-1">Apps</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/explore" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-search"></span>
                </span>
                <span class="nav-link-text ps-1">Explore</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">App </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <a class="nav-link" href="https://artsmart.ai/playground" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-shapes"></span>
                </span>
                <span class="nav-link-text ps-1">Playground</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/apps/outpainting" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="fa-solid fa-panorama"></i>
                </span>
                <span class="nav-link-text ps-1">Outpainting </span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/users/self/profile" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="fa-regular fa-id-badge"></i>
                </span>
                <span class="nav-link-text ps-1">My Profile</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/users/self/my-tunes" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="fa-solid fa-wand-magic-sparkles"></i>
                </span>
                <span class="nav-link-text ps-1">My Tunes</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/usage" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="fa-solid fa-arrow-right-arrow-left"></i>
                </span>
                <span class="nav-link-text ps-1">Usage</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Admin Dashboard </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <a class="nav-link" href="https://artsmart.ai/reports?user=all&amp;type=daily" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="far fa-chart-bar"></i>
                </span>
                <span class="nav-link-text ps-1">Analysis Reports</span>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Others </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider" />
              </div>
            </div>
            <a class="nav-link" href="https://artsmart.ai/pricing" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-tags"></span>
                </span>
                <span class="nav-link-text ps-1">Pricing</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.super.site/" role="button" data-bs-toggle aria-expanded="false" target="_blank">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-book"></span>
                </span>
                <span class="nav-link-text ps-1">Docs</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/roadmap" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fa-solid fa-wave-square"></span>
                </span>
                <span class="nav-link-text ps-1">Roadmap</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.super.site/changelog" role="button" data-bs-toggle aria-expanded="false" target="_blank">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <i class="fa-solid fa-list-check"></i>
                </span>
                <span class="nav-link-text ps-1">Whats New</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/faq" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-question-circle"></span>
                </span>
                <span class="nav-link-text ps-1">FAQs</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/contact-us" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-envelope-open"></span>
                </span>
                <span class="nav-link-text ps-1">Contact Us</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/api/manage" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fas fa-rocket"></span>
                </span>
                <span class="nav-link-text ps-1">API Developers</span>
              </div>
            </a>
            <a class="nav-link" href="https://artsmart.ai/privacy-policy" role="button" data-bs-toggle aria-expanded="false">
              <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                  <span class="fa fa-table"></span>
                </span>
                <span class="nav-link-text ps-1">Privacy Policy</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="content pb-0" style="background:#0b1727">
    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" id="layout-header" style="background:#0b1727">
      <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
          <span class="toggle-line"></span>
        </span>
      </button>
      <a class="navbar-brand me-1 ms-2 me-sm-3" href="https://artsmart.ai">
        <div class="d-flex align-items-center py-1">
          <span class="font-sans-serif fs-2 fw-normal" style="color: white;">ART <span class="fw-bold">SMART</span>
            <span class="fs--1 ms-1">AI</span>
          </span>
        </div>
      </a>
      <ul class="navbar-nav align-items-center d-none d-lg-block"></ul>
      <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <li class="nav-item" id="usageCredit">
          <div class="d-flex align-items-center  me-3 " style="gap: .25rem;">
            <div class="credit-info">
              <div class="credit-label-value">
                <h6 class="title-credit text-600 mb-0"> Playground Credits </h6>
                <div class="d-flex flex-row justify-content-between">
                  <span class="label-credit">Remaining:</span>
                  <span class="value-credit">100</span>
                </div>
              </div>
              <div class="progress" style="height:5px">
                <div class="progress-bar rounded-3 bg-success" role="progressbar" style="width: 0%; background-color: #EB5757 !important;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="dropdown-abs dropdown font-sans-serif btn-reveal-trigger d-flex justify-content-end p-0">
                <button class="btn-credit btn btn-text p-1 shadow-none text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                  <span data-bs-toggle="tooltip" title="Credits">
                    <i class="fa-solid fa-angle-down"></i>
                  </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end border pt-2 mt-2 pb-3" style="min-width: 280px;">
                  <div class="card-body mx-3">
                    <div class="row">
                      <div class="credit-info">
                        <div class="credit-label-value">
                          <h6 class="title-credit text-600 mb-0"> Playground Credits </h6>
                          <div class="d-flex flex-row justify-content-between">
                            <span class="label-credit">Remaining:</span>
                            <span>
                              <span class="value-credit">100</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="The credits will be reset at the beginning of every month.">
                                <i class="fa-solid fa-circle-info"></i>
                              </span>
                            </span>
                          </div>
                        </div>
                        <div class="progress bg-100" style="height:8px">
                          <div class="progress-bar rounded-3 bg-success" role="progressbar" style="width: 0%; background-color: #EB5757 !important;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="note-label-info" style="text-align: right;">Total credit monthly: 0</span>
                      </div>
                      <div class="credit-info">
                        <div class="credit-label-value">
                          <h6 class="title-credit text-600 mb-0"> Tune Credits </h6>
                          <div class="d-flex flex-row justify-content-between">
                            <span class="label-credit">Remaining:</span>
                            <span>
                              <span class="value-credit">1 </span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="The ai model that is trained on what your look like">
                                <i class="fa-solid fa-circle-info"></i>
                              </span>
                            </span>
                          </div>
                        </div>
                        <div class="progress bg-100" style="height:8px">
                          <div class="progress-bar rounded-3 bg-success" role="progressbar" style="
                                                width: 0%;
                                                background-color: #EB5757 !important; " aria-valuenow="0" aria-valuemin="0" aria-valuemax="1"></div>
                        </div>
                      </div>
                      <div class="credit-info">
                        <div class="credit-label-value">
                          <h6 class="title-credit text-600 mb-0"> Tune Images Credits </h6>
                          <div class="d-flex flex-row justify-content-between">
                            <span class="label-credit">Remaining:</span>
                            <span>
                              <span class="value-credit">64</span>
                              <span class="ms-1" data-bs-toggle="tooltip" title="Tune images are the images that are generated from your tunes.">
                                <i class="fa-solid fa-circle-info"></i>
                              </span>
                            </span>
                          </div>
                        </div>
                        <div>
                          <div class="progress bg-100" style="height:8px">
                            <div class="progress-bar rounded-3 bg-success" role="progressbar" style="width: 0%; background-color: #EB5757 !important;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="64"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a role="button" tabindex="0" href="https://artsmart.ai/pricing" class="btn btn-outline-success btn-sm fs--3 mt-4 mb-2 w-100">Add More Credits</a>
                  </div>
                </div>
                <span class="area-icon-right">
                  <i class="fa-solid fa-angle-down"></i>
                </span>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="btn shadow-none outline-none px-1" href="https://artsmart.ai">
            <svg data-bs-toggle="tooltip" title="Apps" data-bs-placement="bottom" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid" role="img" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512" class="svg-inline--fa fa-grid fa-lg">
              <path fill="currentColor" d="M0 72C0 49.9 17.9 32 40 32H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V72zM0 232c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V232zM128 392v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40zM160 72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V72zM288 232v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM160 392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V392zM448 72v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM320 232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V232zM448 392v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40z" class></path>
            </svg>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-l pt-1 user-pp loaded">
              <div class="avatar-name rounded-circle ">
                <span>A</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
            <div class="bg-white dark__bg-1000 rounded-2 py-2">
              <a class="dropdown-item fw-bold text-warning" href="https://artsmart.ai/pricing" rel="norefferer">
                <span class="fas fa-crown me-1"></span>
                <span>Choose a Plan</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="https://artsmart.ai/showcase/36e28225-6075-4dce-b62e-71aa7be74b56">My Profile</a>
              <a class="dropdown-item" onclick="actionUser('https://artsmart.ai/user/setting/profile')" data-bs-toggle="modal" data-bs-target="#modalContainer" href="javascript:void(0)">Settings</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="https://artsmart.ai/logout">
                <input type="hidden" name="_token" value="Vq9GDEAiJH7z9mVrxowj4b81qNt9YU1ARRWS8Dpx">
                <a class="dropdown-item" href="https://artsmart.ai/logout" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </nav>