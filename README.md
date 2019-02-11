# Template para Wiki-Ema
- [Wiki-Ema](https://github.com/hgodinho/wiki-ema)
- @version `0.5`
- @source https://emaklabin.org.br

***
## @todo
- arrumar menu 
> adicionado a classe wp-bootstrap-navwalker @source https://github.com/wp-bootstrap/wp-bootstrap-navwalker @status em teste

- arrumar paginação da lista de obras de autores
> o problema está no CPT. como o autor é criado em formato 'post' (hierarchical => false), não consigo criar uma paginação dentro dele, uma vez que não é possivel transformar um post em archive-page. precisa de uma outra solução que possa criar algum tipo de paginação com query no mb-relationships

> @update [2019-02-05] pode ser que usando a paginação em ordem alfabetica solucione, uma vez que o core dela é em custom taxonomy. continuar desenvolvimento da classe inc/alphabetical-pagination/wp-bootstrap-alphabetical-pagination.php

- arrumar searchform 

- desenhar a home

- alerta de pre-alfa

***
## 0.5
### added
- inc/alphabetical-pagination/wp-bootstrap-alphabetical-pagination.php
- taxonomy-autor_a_z.php

### changed
- archive-autores.php
- functions.php
- single-autores.php
- taxonomy-classificacao.php
- template-parts/autor/content-obras-do-autor.php
- template-parts/autor/content-lista-autor.php
- template-parts/jumbotron-home.php
- single-wiki_ema-nucleos.php
- taxonomy-nucleo.php
- taxonomy-ambiente.php

### removed
- taxonomy-tipo_autor.php
- js/ajax-pagination.js


## 0.4
### added
- query_arquivo_principal() no functions.php
- archive-obras.pgp
- /inc/pagination/wp-bootstrap4.1-pagination.php
- search.php
- searchform.php
- /template-parts/autor/content-lista-autor.php

### changed
- archive-autores.ph
- functions.php
- single-obras.php
- single-wiki_ema-classificacoes.php
- taxonomy-classificacao.php
- /template-parts/ambiente/content-obras-no-ambiente.php
- /template-parts/autor/content-obras-do-autor.php
- /template-parts/header/header-breadcrumb.php
- /template-parts/header/header-menu.php
- /template-parts/obra/content-cartao-obra.php

***
## 0.3
### added
- header-menu.php
- template-parts/carousel/carousel-ambiente.php
- template-parts/ambiente/content-obras-no-ambiente.php
- taxonomy-tipo_ator.php
- taxonomy-nucleo.php
- taxonomy-classificacao.php
- taxonomy-ambiente.php
- single-wiki_ema-nucleos.php
- single-wiki_ema-clasificacoes.php
- single-wiki_ema-ambientes.php
- page-wiki-ema.php // organizar isso
- composer
- apigen.neon
- doc/

### changed
- .gitignore
- css/estilos.css
- functions.php
- header.php
- template-parts/header/header-breadcrumb.php

### removed
- index.php
- archive-autor.php

***
## `0.2`
### added
- owl carousel
- single-autores.php
- template parts do autor
- template parts modal
- template parts header
- template parts obra
- 404.php

### changed
- single-obras.php
- functions.php
- header.php
- css/estilos.css
- index.php
- content-obra.php
- content-obradomes.php para-obra-do-mes.php

### removed
- content-obrasingle.php


## `0.1`
inicio do tema