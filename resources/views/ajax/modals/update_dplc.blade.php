<div class="modal-body">
<div class="alert-container"></div>
                                            <div id="alert-container"></div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Dplc Name</label>
                                                        <input type="text" name="update_dplc_name" id="update_dplc_name" value="{{ $dplc_name }}" class="form-control form-control-sm" placeholder="Type City Name" required>
                                                         <input type="hidden"  name="update_id" id="update_id" value="{{ $id }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">City</label>
                                                            <select class="form-select" data-trigger name="update_cty_id" id="update_cty_id">
                                                                <option value="{{ $cty_id }}">{{ $city_name['name'] }}</option>
                                                                 @if(is_array($city) && count($city) > 0)
                                                                            @foreach($city as $item)
                                                                                <option value="{{ $item['cty_id'] }}">{{ $item['name'] }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            <p>No city available.</p>
                                                                        @endif
                                                            </select>
                                                    </div>
                                                
                                            </div>
                                          