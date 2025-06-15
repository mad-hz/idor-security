# IDOR Prevention Demo

## Hosted Application
https://zolveisa.nl

Login credentials:
  - Email: hz@madnl.nl
  - Password: secret123
  
## Session Hjacking
Luckily, Laravel already protects against such an attach, however to extend it, I have made a middleware and made some changes to the session.

The middleware could be found under: ***App\Http\Middleware\SecurityHeaders.php***
The aim of the middleware is to prevent some common attacks, for instance, XSS, clickjacking and sniffing attacks by setting secure headers.

Another thing, I have modified the .env-example file as to be seen, in production, it will the ***.env*** file, the changes I have made are for the sessions to be set as secure and samesite strict, in conclusion this is the features that have been added:

- Session cookies are set as secure, HTTP-only, and SameSite strict.
- Debug mode is off in production.
- Secure headers are set to mitigate XSS, clickjacking, and sniffing.
  
## IDOR
I have made an ***ArticlePolicy***, for the following actions:
  - Update
  - Delete
  
This to ensure whoever updates or deletes an article, is the user who did make the article and not by someone else. Of course, this has been done on the UI as well using the @can directive.

## Testing
   - URL: `/articles/{id}`
   - Test: 
     - Login as hz@madnl.nl (password: secret123)
     - Access article 1 [/articles/1/edit](https://zolveisa.nl/articles/1/edit)
     - Try editing and submiting
     - You should get an 403 since the article does not belong to you
