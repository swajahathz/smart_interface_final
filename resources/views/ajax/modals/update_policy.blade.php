<div class="modal-body">
<div class="alert-container"></div>
                                            <div id="alert-container"></div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Policy Name</label>
                                                        <input type="text" name="update_name" id="update_name" value="{{ $policyname }}" class="form-control form-control-sm" placeholder="Type Policy Name" required>
                                                         <input type="hidden"  name="update_id" id="update_id" value="{{ $policyid }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Policy Description</label>
                                                        <input type="text" name="update_desc" id="update_desc" value="{{ $policydesc }}" class="form-control form-control-sm" placeholder="Type Policy Description" required>
                                                       
                                                    </div>
                                                 
                                                
                                            </div>
                                          