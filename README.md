# Inbox.lv Checker PoC

Proof of Concept checker for inbox.lv

Inbox returns 3 response types =>

1. **Failed** -
   `<title>Redirecting to https://www.inbox.lv/?actionID=imp_login_&amp;reason=failed&amp;redirect_url=https://www.inbox.lv/?actionID=imp_login_&amp;ts=1694822826</title>`

2. **Logged in, no captcha solution needed** - 
   `<meta http-equiv="refresh" content="0;url='https://www.inbox.lv/?actionID=imp_login_&amp;logged_in=1&amp;language=lv&amp;ts=1694822586'" />`

3. **Captcha needs to be solved, but most likely valid (if we are using good proxy)** -
   `<meta http-equiv="refresh" content="0;url='/login/captcha?captcha=on&amp;redirect_url=https%3A%2F%2Fwww.inbox.lv%2F%3FactionID%3Dimp_login_&amp;reason=failed&amp;needs_only_captcha=on&amp;ts=1694812131'" />`
