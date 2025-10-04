<div class="modal-body">
<div class="alert-container"></div>
                                            <div id="alert-container"></div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Group Name</label>
                                                        <input type="text" name="update_groupname" id="update_groupname" value="{{ $groupname }}" class="form-control form-control-sm" placeholder="Type Policy Name" readonly>
                                                         <input type="hidden"  name="update_id" id="update_id" value="{{ $id }}">
                                                          <input type="hidden"  name="update_group_id" id="update_group_id" value="{{ $group_id }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Attribute</label>
                                                        <input type="text" name="update_attribute" id="update_attribute" value="{{ $attribute }}" class="form-control form-control-sm" placeholder="Type attribute" required>
                                                       
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">OP</label>
                                                        <input type="text" name="update_op" id="update_op" value="{{ $op }}" class="form-control form-control-sm" required>
                                                       
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Value</label>
                                                        <input type="text" name="update_value" id="update_value" value="{{ $value }}" class="form-control form-control-sm" placeholder="Type Value" required>
                                                       
                                                    </div>
                                                 
                                                
                                            </div>
                                          