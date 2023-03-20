# BLOG PERSONAL
Un blog amb el framework laravel on pots publicar els teus propis post, editar-les i eliminar-les. A més cada post es pot accedir a una pàgina on el pots comentar.
Per poder publicar posts i comentar, és necessari registrar-se i tenir un usuari propi

## ROLES
### User Guest
> Crear posts
> Editar els seus propis posts
> Eliminar el seus posts
> Accedir als seus propis posts en el dashboard

### User Admin
> Crear posts
> Editar i eliminar posts de tots els usuaris
> Veure la llista d’usuaris (dashboard)
> Eliminar usuaris

## PAGES
Home page
> Welcome page bàsic de laravel
> Menú navegació de Login i Register

### PostPios
> Pàgina on es mostren tots els post que han fet tots els usuaris.
> L’usuari loguejat pot real·litzar i crear post
> Por editar els seus propis posts

### Comment Page
> Per accedir s’ha de clicar el títol d’un post
> Es veu el post que hem seleccionat i tots els comentaris que s’hagin fet
> Espai de text per poder publicar els teus comentaris

### Dashboard Guest
> Usuari normal 
> Es poden veure tots els posts que ha fet el propi usuari loguejat

### Admin  Dashboard
> Només pot accedir l’usuri amb role_id admin
> Mostra una taula amb tots els usuaris creats
> Opcíó d’eliminar usuaris

### Profile Page
> Default de laravel
> Configuració de l’usuari
