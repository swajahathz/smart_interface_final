<div class="modal-body">
<div class="alert-container"></div>
                                            <div id="alert-container"></div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Name</label>
                                                        <input type="text" name="update_name" id="update_name" value="{{ $name }}" class="form-control form-control-sm" placeholder="Type Plan Name" required>
                                                         <input type="hidden"  name="update_qouta_id" id="update_qouta_id" value="{{ $qouta_id }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Value</label>
                                                        <input type="text" id="update_value" value="{{ $value }}" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Price</label>
                                                        <input type="text" id="update_price" value="{{ $price }}" class="form-control form-control-sm" required>
                                                    </div>
                                                
                                            </div>
                                          