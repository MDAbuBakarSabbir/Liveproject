<?php
    include("extends/header.php");
?>

<div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="settingsInputEmail" class="form-label">Email address</label>
                                                        <input type="email" class="form-control" id="settingsInputEmail" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                                        <div id="settingsEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="(xxx) xxx-xxxx">
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg">
                                                    <div class="col-md-6">
                                                        <label for="settingsInputFirstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="settingsInputFirstName" placeholder="John">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="settingsInputLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="settingsInputLastName" placeholder="Doe">
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg">
                                                    <div class="col-md-6">
                                                        <label for="settingsInputUserName" class="form-label">Username</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="settingsInputUserName-add">neptune.com/</span>
                                                            <input type="text" class="form-control" id="settingsInputUserName" aria-describedby="settingsInputUserName-add" placeholder="username">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="settingsState" class="form-label">State</label>
                                                        <select class="js-states form-control select2-hidden-accessible" id="settingsState" tabindex="-1" style="display: none; width: 100%" data-select2-id="settingsState" aria-hidden="true">                           
                                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-settingsState-container"><span class="select2-selection__rendered" id="select2-settingsState-container" role="textbox" aria-readonly="true" title="Alaska">Alaska</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg">
                                                    <div class="col">
                                                        <label for="settingsAbout" class="form-label">About</label>
                                                        <textarea class="form-control" id="settingsAbout" maxlength="500" rows="4" aria-describedby="settingsAboutHelp"></textarea>
                                                        <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div>
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="SettingsNewsLetter">
                                                            <label class="form-check-label" for="SettingsNewsLetter">
                                                                Receive notifications about updates &amp; maintenances
                                                            </label>
                                                        </div>
                                                        <a href="#" class="btn btn-primary m-t-sm">Update</a>
                                                    </div>
                                                </div>
                                            </div>