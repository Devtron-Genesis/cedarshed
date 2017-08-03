function login(){
    jQuery('.right .user_login .content form#tvn-login-form').css({"display":"block"});
    jQuery('#loginTabWrap a').css({"background": "#EFF2F6", "color": "#000000"});
    jQuery('#loginTabWrap').css({"background": "#EFF2F6"});
    jQuery('#loginTabWrap a').css({"border-radius": "0 6px 0 0"});
    jQuery('.right .user_login .content a#login_exit').css({"display":"block"});
}

function login_exit(){
    jQuery('.right .user_login .content form#tvn-login-form').css({"display":"none"});
    jQuery('.right .user_login .content a#login_exit').css({"display":"none"});
    jQuery('#loginTabWrap a').css({"background": "#393732", "color": "white"});
    jQuery('#loginTabWrap a').css({"border-radius": "0 6px 6px 0"});
}
