<form class="form-horizontal" role="form" @submit.prevent="submitBankingDetails('form-banking')" data-vv-scope="form-banking">
                         <div class="col-xs-12 col-md-6 ">
                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-banking.bankName')}">
                                <label for="bankName" class=" control-label">Bank Name <span class="required-star">*</span></label>

                                <div class="">
                                    <input data-vv-scope="scope"  id="bankName" type="text" name="bankName" class="form-control" v-model="bankingDetails.bankName" v-validate="{ rules: { required: true} }" >
                                    <span class="help-block" v-show="errors.has('form-banking.bankName')">
                                        <strong>@{{ errors.first('form-banking.bankName') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-banking.branchCode')}">
                                <label for="branchCode" class=" control-label">Branch Code<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchCode" type="text" class="form-control" name="branchCode" v-model="bankingDetails.branchCode" v-validate="{ rules: { required: true} }" > 
                                     <span class="help-block" v-show="errors.has('form-banking.branchCode')">
                                        <strong>@{{ errors.first('form-banking.branchCode') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group label-floating padding-right-10" :class="{ error: errors.has('form-banking.accountNumber')}">
                                <label for="accountNumber" class=" control-label">Account Number<span class="required-star">*</span> </label>

                                <div class="">
                                    <input id="accountNumber" type="text" class="form-control" v-model="bankingDetails.accountNumber" name="accountNumber" v-validate="{ rules: { required: true} }"> 
                                   <span class="help-block" v-show="errors.has('form-banking.accountNumber')">
                                        <strong>@{{ errors.first('form-banking.accountNumber') }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group  label-floating padding-right-10" :class="{ error: errors.has('form-banking.branchName')}">
                            
                                <label for="branchName" class="control-label">Branch Name<span class="required-star">*</span></label>

                                <div class="">
                                    <input id="branchName" type="text" class="form-control" name="branchName" v-model="bankingDetails.branchName" v-validate="'required'"> 
                                     <span class="help-block" v-show="errors.has('form-banking.branchName')">
                                        <strong>@{{ errors.first('form-banking.branchName') }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group label-floating padding-right-10 " :class="{ error: errors.has('form-banking.accountHolderName')}">
                                <label for="accountHolderName" class=" control-label">Account Holder's Name</label>
                                <div class="">
                                    <input id="accountHolderName" type="text" class="form-control" v-model="bankingDetails.accountHolderName" name="accountHolderName" v-validate="'required'" value="{{old('accountHolderName')}}">
                                    <span class="help-block" v-show="errors.has('form-banking.accountHolderName')">
                                        <strong>@{{ errors.first('form-banking.accountHolderName') }}</strong>
                                    </span>
                                </div>
                            </div>
                          
                            <div class="form-group label-floating padding-right-10">
                                <label for="accountType" class="control-label ">Account Type<span class="required-star">*</span></label>

                                <div class="">
                                    <select name="accountType" id="accountType" v-model="bankingDetails.accountType" class="form-control ">
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
                         <div class="col-xs-12 text-center">

                            <div class="form-group label-floating padding-right-10">
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>
              

        
</form>