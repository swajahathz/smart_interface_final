
            <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    <div class="input-group">
                        <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                        <input id="dashboard-search" type="search" class="form-control border-0 px-2" placeholder="Quick Subscriber Search" aria-label="Search">
                      
                    </div>
                    <!--<div class="mt-4">-->
                    <!--    <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>-->
                    <!--    <span class="search-tags"><i class="fe fe-user me-2"></i>Subscriber</span>-->
                    <!--    <span class="search-tags"><i class="fe fe-file-text me-2"></i>Manager</span>-->
                    <!--    <span class="search-tags"><i class="fe fe-align-left me-2"></i>Service</span>-->
                    <!--    <span class="search-tags"><i class="fe fe-server me-2"></i>Nas</span>-->
                    <!--</div>-->
                    <!--<div class="mt-4">-->
                    <!--    <p class="font-weight-semibold text-muted mb-2"></p>-->
                    <!--  </div>-->
                  
                    
                    
                     <div class="row mt-4">
                    <div class="col-xl-12" id="dashboard_search_according" style="display:none;">
                        <div class="accordion accordion-primary" id="accordionPrimaryExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPrimaryOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapsePrimaryOne" aria-expanded="true"
                                                aria-controls="collapsePrimaryOne">
                                                Results : Subscriber Found <span class="badge ms-2 bg-primary" id="dashboard_subscriber_found"  style="display:none;">0</span>
                                                <div id="dashboard_search_spinner" style="margin-left:5px;display:none;"><span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span></div>
                                            </button>
                                        </h2>
                                        <div id="collapsePrimaryOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingPrimaryOne"
                                            data-bs-parent="#accordionPrimaryExample">
                                            <table class="table mt-2">
                                                    <thead>
                                                        <tr>
                                                            <td style="background-color:#677aff17;    padding: 0 12px;">USERID</td>
                                                            <td style="background-color:#677aff17;    padding: 0 12px;">MOBILE</td>
                                                            <td style="background-color:#677aff17;    padding: 0 12px;">OWNER</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dashboard_search_result">
                                                        
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="headingPrimaryTwo">-->
                                    <!--        <button class="accordion-button collapsed" type="button"-->
                                    <!--            data-bs-toggle="collapse" data-bs-target="#collapsePrimaryTwo"-->
                                    <!--            aria-expanded="false" aria-controls="collapsePrimaryTwo">-->
                                    <!--            Manager-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="collapsePrimaryTwo" class="accordion-collapse collapse"-->
                                    <!--        aria-labelledby="headingPrimaryTwo"-->
                                    <!--        data-bs-parent="#accordionPrimaryExample">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            <strong>This is the first item's accordion body.</strong> It is shown by-->
                                    <!--            default, until the collapse plugin adds the appropriate classes that we-->
                                    <!--            use to style each element. These classes control the overall appearance,-->
                                    <!--            as well as the showing and hiding via CSS transitions. You can modify-->
                                    <!--            any of this with custom CSS or overriding our default variables. It's-->
                                    <!--            also worth noting that just about any HTML can go within the-->
                                    <!--            <code>.accordion-body</code>, though the transition does limit overflow.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="headingPrimaryThree">-->
                                    <!--        <button class="accordion-button collapsed" type="button"-->
                                    <!--            data-bs-toggle="collapse" data-bs-target="#collapsePrimaryThree"-->
                                    <!--            aria-expanded="false" aria-controls="collapsePrimaryThree">-->
                                    <!--            Service-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="collapsePrimaryThree" class="accordion-collapse collapse"-->
                                    <!--        aria-labelledby="headingPrimaryThree"-->
                                    <!--        data-bs-parent="#accordionPrimaryExample">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            <strong>This is the first item's accordion body.</strong> It is shown by-->
                                    <!--            default, until the collapse plugin adds the appropriate classes that we-->
                                    <!--            use to style each element. These classes control the overall appearance,-->
                                    <!--            as well as the showing and hiding via CSS transitions. You can modify-->
                                    <!--            any of this with custom CSS or overriding our default variables. It's-->
                                    <!--            also worth noting that just about any HTML can go within the-->
                                    <!--            <code>.accordion-body</code>, though the transition does limit overflow.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="accordion-item">-->
                                    <!--    <h2 class="accordion-header" id="headingPrimaryFour">-->
                                    <!--        <button class="accordion-button collapsed" type="button"-->
                                    <!--            data-bs-toggle="collapse" data-bs-target="#collapsePrimaryFour"-->
                                    <!--            aria-expanded="false" aria-controls="collapsePrimaryFour">-->
                                    <!--            Nas-->
                                    <!--        </button>-->
                                    <!--    </h2>-->
                                    <!--    <div id="collapsePrimaryFour" class="accordion-collapse collapse"-->
                                    <!--        aria-labelledby="headingPrimaryFour"-->
                                    <!--        data-bs-parent="#accordionPrimaryExample">-->
                                    <!--        <div class="accordion-body">-->
                                    <!--            <strong>This is the first item's accordion body.</strong> It is shown by-->
                                    <!--            default, until the collapse plugin adds the appropriate classes that we-->
                                    <!--            use to style each element. These classes control the overall appearance,-->
                                    <!--            as well as the showing and hiding via CSS transitions. You can modify-->
                                    <!--            any of this with custom CSS or overriding our default variables. It's-->
                                    <!--            also worth noting that just about any HTML can go within the-->
                                    <!--            <code>.accordion-body</code>, though the transition does limit overflow.-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                       
                    </div>
                    
                    </div>
                    </div>
                   
                    <!--<div class="modal-footer">-->
                    
                    <!--</div>-->
                </div>
                </div>
            </div>