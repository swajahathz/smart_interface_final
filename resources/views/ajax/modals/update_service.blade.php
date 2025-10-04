<div class="modal-body">
                                            <div class="alert-container"></div>
                                                <form id="service_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Service Name</label>
                                                        <input type="text" id="update_srvname" class="form-control form-control-sm" value="{{ $srvname }}" placeholder="Type Service Name" required>
                                                        <input type="hidden" id="token" value="{{ $token }}"/>
                                                        <input type="hidden" id="update_id" value="{{ $srvid }}"/>
                                                    </div>
                                                    
                                                  

                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">IP POOL</label>
                                                            <select class="form-select" data-trigger name="update_ippool" id="update_ippool">
                                                                <option value="{{ $pool_id }}">{{ $pool_name }}</option>
                                                                 @if(is_array($pool) && count($pool) > 0)
                                                                            @foreach($pool as $item)
                                                                                <option value="{{ $item['pool_id'] }}">{{ $item['name'] }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            <p>No pools available.</p>
                                                                        @endif
                                                            </select>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">POLICY</label>
                                                            <select class="form-select" data-trigger name="update_policy" id="update_policy">
                                                                <option value="{{ $policy_id }}">{{ $policy_name }}</option>
                                                                @if(is_array($policy) && count($policy) > 0)
                                                                            @foreach($policy as $item)
                                                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                                                
                                                                                
                                                                            @endforeach
                                                                        @else
                                                                            <option value="0">No Policy</option>
                                                                        @endif
                                                                        <option value="0">No Policy</option>
                                                            </select>
                                                    </div>

                                            

                                                    <div class="input-group mb-3">
                                                            <button type="button" class="btn btn-success">Download Speed</button>
                                                            <button type="button"
                                                                class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                            @for ($value = 1; $value <= 100; $value += ($value < 10 ? 9 : 10))
                                                                <li class="dropdown-item" style="cursor:pointer;" data-speed="{{ $value }}" onclick="downspeed()">{{ $value }} MB</li>
                                                                <hr class="dropdown-divider">
                                                            @endfor

                                                            </ul>
                                                            <input type="number" name="update_downspeed" id="update_downspeed"  value="{{ $downrate }}" class="form-control downspeed" placeholder="Type custom speed in KB"
                                                                aria-label="Text input with segmented dropdown button" required>
                                                        </div>
                                                        
                                                      
                                                    

                                                    <div class="input-group mb-3">
                                                        <button type="button" class="btn btn-danger">Upload Speed</button>
                                                        <button type="button"
                                                            class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="visually-hidden">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                        @for ($value = 1; $value <= 100; $value += ($value < 10 ? 9 : 10))
                                                        <li class="dropdown-item" style="cursor:pointer;" data-speed="{{ $value }}" onclick="upspeed()">{{ $value }} MB</li>
                                                            <hr class="dropdown-divider">
                                                        @endfor

                                                        </ul>
                                                        <input type="number" name="update_upspeed" id="update_upspeed" value="{{ $uprate }}" class="form-control upspeed" placeholder="Type custom speed in KB"
                                                            aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="mb-3 col-8">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Package Type</label>
                                                                <select class="form-select" data-trigger name="update_recharge_type" id="update_recharge_type">
                                                                            <option value="{{ $recharge_type }}" selected>
    @if ($recharge_type == 0)
        Add Month (Fix Price)
    @elseif ($recharge_type == 1)
        Add Days (Fix Price)
    @elseif ($recharge_type == 2)
        Add Month (Per Day Price)
    @elseif ($recharge_type == 4)
          Billing Cycle (Fix Date) 
    @endif
</option>

                                                                                    <option value="0">Add Month (Fix Price)</option>
                                                                            <option value="1">Add Days (Fix Price)</option>
                                                                            <option value="2">Add Month (Per Day Price)</option>
                                                                            <option value="4">Billing Cycle (Fix Date)</option>
                                                                </select>
                                                        </div>
                                                        <div class="mb-2  col-4">
                                                        <label for="recipient-name"
                                                            class="col-form-label billing_qty" id="">    @if ($recharge_type == 0)
        Qty
    @elseif ($recharge_type == 1)
       Qty
    @elseif ($recharge_type == 2)
        Qty
    @elseif ($recharge_type == 4)
        Date (1 to 28)
    @endif</label>
                                                        <input type="number" name="update_qty" id="update_qty" class="form-control form-control" value="{{ $qty }}">
                                                       
                                                    </div>
                                                    </div>
                                                    
                                                     <div class="d-flex">
                                                        
                                                    
                                                    
                                                            <div class="mb-2">
                                                                <label for="recipient-name"
                                                                    class="col-form-label">Qouta Limit </label>
                                                                <input type="radio" name="qouta_enable" value="1"
    @if($qouta_enable == 1)
        checked
    @endif
/> Enable

<input type="radio" name="qouta_enable" value="0"
    @if($qouta_enable == 0)
        checked
    @endif
/> Disable
                                                                <input type="number" name="qouta_limit" id="update_qouta_limit" class="form-control form-control-sm" placeholder="Type limit in MB" value="{{ $qouta_limit }}">
                                                               
                                                            </div>
                                                            
                                                            <!--<div class="mb-2">-->
                                                            <!--    <label for="recipient-name"-->
                                                            <!--        class="col-form-label">Limit</label>-->
                                                            <!--    <input type="number" name="update_srb" id="update_qouta_limit" class="form-control form-control-sm" placeholder="Type limit in MB" value="{{ $srbTax }}">-->
                                                               
                                                            <!--</div>-->
                                                                                        
                                                    </div>
                                                                                        
                                                       <div class="d-flex">
                                                        
                                                    
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Price</label>
                                                        <input type="number" name="update_price" id="update_price" class="form-control form-control-sm" placeholder="Service Price" value="{{ $basePrice }}">
                                                       
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Srb. Tax</label>
                                                        <input type="number" name="update_srb" id="update_srb" class="form-control form-control-sm" placeholder="Tax amount." value="{{ $srbTax }}">
                                                       
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Adv. Tax</label>
                                                        <input type="number" name="update_adv" id="update_adv" class="form-control form-control-sm" placeholder="Tax amount." value="{{ $advTax }}">
                                                       
                                                    </div>
                                                                                        
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Description</label>
                                                        <input type="text" name="desc" id="update_desc"  value="{{ $descr }}" class="form-control form-control-sm" placeholder="Type Description" required>
                                                    </div>
                                            </div>