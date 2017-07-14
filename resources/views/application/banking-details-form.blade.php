                         <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('bankName')}">
                                <label for="bankName" class=" control-label">Bank Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input data-vv-scope="scope"  id="bankName" type="text" name="bankName" class="form-control" v-model="application.bankName" v-validate="{ rules: { required: true} }" >
                                    <span class="help-block" v-show="errors.has('bankName')">
                                        <strong>@{{ errors.first('bankName') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('branchCode')}">
                                <label for="branchCode" class=" control-label">Branch Code<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchCode" type="text" class="form-control" name="branchCode" v-model="application.branchCode" v-validate="{ rules: { required: true} }" > 
                                     <span class="help-block" v-show="errors.has('branchCode')">
                                        <strong>@{{ errors.first('branchCode') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('accountNumber')}">
                                <label for="accountNumber" class=" control-label">Account Number<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="accountNumber" type="text" class="form-control" v-model="application.accountNumber" name="accountNumber" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('accountNumber')">
                                        <strong>@{{ errors.first('accountNumber') }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('branchName')}">
                            
                                <label for="branchName" class="control-label">Branch Name<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchName" type="text" class="form-control" name="branchName" v-model="application.branchName" v-validate="'required'"> 
                                     <span class="help-block" v-show="errors.has('branchName')">
                                        <strong>@{{ errors.first('branchName') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 ">
                                <label for="accountHolderName" class=" control-label">Account Holder's Name</label>
                                <div class="">
                                    <input id="accountHolderName" type="text" class="form-control" v-model="application.accountHolderName" name="accountHolderName" v-validate="'required'" value="{{old('accountHolderName')}}">
                                    <span class="help-block" v-show="errors.has('accountHolderName')">
                                        <strong>@{{ errors.first('accountHolderName') }}</strong>
                                    </span>
                                </div>
                            </div>
                          
                            <div class="form-group label-floating padding-right-10">
                                <label for="accountType" class="control-label ">Account Type<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="accountType" id="accountType" v-model="application.accountType" class="form-control ">
                                            <option value="''"></option>
                                            <option value="cheque">Cheque</option>
                                            <option value="savings">Savings</option>
                                        </select> 
                                        
                               <span class="help-block" v-show="errors.has('accountType')">
                                        <strong>@{{ errors.first('accountType') }}</strong>
                                    </span>
                                </div>
                            </div>


                        </div>
              

        