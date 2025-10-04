<div class="tab-pane text-muted" id="recharge"
                                                    role="tabpanel" style="padding:5px;">
                                                    <div class="col-xl-12 tran_card_success" style="display:none;height: 50vh;justify-content: center;
                                                                align-items: center;flex-direction: column;">

                                                       <div class="mb-3">
                                                           <span class="avatar avatar-md avatar-rounded bg-success" style="width: 5rem;height: 5rem;">
                                                              <i class='bx bx-check' style="    color:rgb(255, 255, 255);font-size: 30px;"></i>
                                                            </span>
                                                        </div>
                                                       <div style="text-align:center;cursor: pointer;" onclick="location.reload();"><h5>Transaction Successful.</h5><br><i class='bx bx-refresh'></i> Click for Refresh your page.</div>
                                                        
                                                    </div>
                                                    <div class="col-xl-12 tran_card" style="display:none;height: 50vh;justify-content: center;
                                                                align-items: center;flex-direction: column;">

                                                       <div class="mb-3">
                                                           <span class="avatar avatar-md avatar-rounded bg-warning" style="width: 5rem;height: 5rem;">
                                                              <i class='bx bx-loader bx-spin' style="    color:rgb(255, 255, 255);font-size: 30px;"></i>
                                                            </span>
                                                        </div>
                                                       <div>Transaction Processing...</div>
                                                        
                                                    </div>
                                                    <div class="col-xl-12 recharge_card">
                                                        <div class="card custom-card">
                                                        <div class="card-body">
                                                            <div class="row gy-3">
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">
                                                                        {{ $tranId }}-Refund</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Refund Date :</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Current Expire :</p>
                                                                    <p class="fs-15 mb-1">{{ $formatted_new }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">New Expire :</p>
                                                                    <p class="fs-16 mb-1 fw-semibold">{{ $formatted_last }}</span></p>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table nowrap text-nowrap border mt-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Type</th>
                                                                                    <th>DESCRIPTION</th>
                                                                                    <th>QUANTITY</th>
                                                                                    <th>TOTAL</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="fw-semibold">
                                                                                            Card Refund
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="text-muted">
                                                                                            Service: {{ $invoice_info['srvname'] }}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="product-quantity-container">
                                                                                        @php
                                                                                            use Carbon\Carbon;
                                                                                            $newDiff = $diffInDays - 1;
                                                                                        
                                                                                        @endphp
                                                                                        {{ $newDiff }} Days
                                                                                    </td>
                                                                                    <td>
                                                                                    
                                                                                    
                                                                                  {{ number_format($invoice_info['juniorPrice'] / $invoice_info['qty'] * $newDiff, 2) }}
                                                                                    
                                                                                    
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($invoice_info['addons'] > 0)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="fw-semibold">
                                                                                                Addons
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="text-muted">
                                                                                                Static IP
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="product-quantity-container quantity">
                                                                                            {{ $newDiff }} Days
                                                                                        </td>
                                                                                        <td id="perdayaddonvalue">
                                                                                            
                                                                                       {{ number_format($invoice_info['addons'] / $invoice_info['qty'] * $newDiff, 2) }}
                                                                                         
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td colspan="2">
                                                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">
                                                                                                        <p class="mb-0 fs-14">Total:</p>
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <p class="mb-0 fw-semibold fs-16 text-success">
                                                                                      
                                                                                          {{ number_format($invoice_info['ownerPrice'] / $invoice_info['qty'] * $newDiff, 2) }}
                                                                                                           
                                                                                                            </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-xl-12">
                                                                    <div>
                                                                        <label for="invoice-note" class="form-label">Note:</label>
                                                                        <textarea class="form-control form-control-light" id="invoice-note" rows="3">Once the invoice has been verified by the accounts payable team and recorded, the only task left is to send it for approval before releasing the payment</textarea>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-end">
                                                            <button class="btn btn-success recharge" data-username="" data-tranId="">Refund Submit</button>
                                                        </div>
                                                    </div>
                                                     </div>
                                                    
                                                    
                                                </div>