<div class="modal-body">
<div class="alert-container"></div>
                                            <div id="alert-container"></div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">NAS Name</label>
                                                        <input type="text" name="update_name" id="update_name" value="{{ $nasname }}" class="form-control form-control-sm" placeholder="Type NAS Name" required>
                                                         <input type="hidden"  name="update_id" id="update_id" value="{{ $nasid }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">NAS IP</label>
                                                        <input type="text" id="update_serverip" value="{{ $nasip }}" class="form-control form-control-sm" placeholder="192.XXX.XXX.XXX" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Secret</label>
                                                        <input type="text" id="update_secret" value="{{ $secret }}" class="form-control form-control-sm" placeholder="*********" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Description</label>
                                                        <input type="text" id="update_description" value="{{ $desc }}" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">API Username</label>
                                                        <input type="text" id="update_apiusername" value="{{ $apiusername }}" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">API Password</label>
                                                        <input type="text" id="update_apipassword" value="{{ $apipassword }}" class="form-control form-control-sm" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">API Port</label>
                                                        <input type="text" id="update_apiport" value="{{ $apiport }}" class="form-control form-control-sm" required>
                                                    </div>
                                                
                                            </div>
                                          