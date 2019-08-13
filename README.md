# Template para Wiki-Ema
- [Wiki-Ema](https://github.com/hgodinho/wiki-ema)
- @version `0.25`
- @source https://emaklabin.org.br

## `0.25`
- webhook no github adicionado para quando houver novo commit atualizar automaticamente pelo GitHub Updater

## `0.24`
- template para página Ema Klabin 

## `0.23`
- mudança na cor do botão back-to-top
- função de copiar informações no modal-copiar-informacoes.php (ref: https://jsfiddle.net/jfriend00/v9g1x0o6/)
- mudança no tempo do owl-slider
- inicio do template single-wiki_ema-ema-klabin.php @TODO
- mudança no header-archive.php
- ajuste no layout do modal-qr-code.php
- condicional para remover a grade de botoes da obra caso seja visualizada na Home (obra do mês).

## `0.22`
- correção no cabeçalho do tema

## `0.21`
- atualização do cabeçalho do tema no `style.css`

## `0.20`

## `0.19`
- remoção do `PLUGIN_SLUG` do tema. Isso foi uma mudança estratégica ao perceber que a instalação da Wiki utilizando o plugin Multiple Themes geraria um monte de problemas de dificil solução, e que também, poluiria o banco de dados do Site com todas as informações do acervo que seriam acrescentadas na importação. Essa mudança estratégica é importante, pois faz com que a instalação da Wiki seja independente do site, uma nova instalação wordpress no servidor bluehost.  

## `0.18`
- multiplas correções de bugs

## `0.17`
### concluídas
- múltiplas correções de bugs
- adição de novo template para a página Ema Klabin


## `0.16`
### Concluídas
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-22255478
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-22255456
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-22256425

### Em progresso
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-23081224
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-22254886
- https://github.com/hgodinho/wiki-ema-template/projects/1#card-22254879


***
## `0.15`
- templates de busca
- correções

## `0.14`

## `0.13`
### principal
- versão bootstrap 4.3.1
- habilitação de fontes responsíveis
- multiplas correções, ver git log

***
## `0.12`
### principal
- multiplas correções, ver git log

## `0.10`
### principal
- Mudança no bootstrap para poder alterar as variáveis bootstrap usando Sass
> @source <https://hackerthemes.com/kit/>

### changed
- estilos.css
- functions.php
- alphabetical pagination
- searchform.php
- single-wiki_ema-ambientes
- single-wiki_ema-classificacoes
- single-wiki_ema-nucleos
- style.css
- taxonomy-ambientes.php
- taxonomy-autor_az.php
- taxonomy-obra_az.php
- taxonomy-classificao.php
- taxonomy-nucleo.php
- content-obras-no-ambiente.php
- hearder-archive.php


***
## `0.9`

## `0.8`
Padronização dos arquivos e atualização do bootstrap core para 4.3.1

## `0.7`
Some bug fixes.

### added
- template-parts/header/header-archive.php
- template-parts/autor/contet-tabela-autor.php

### changed
- content-campos_clonaveis.php
- content-cartao-obra.php
- content-obra.php
- mudança de lista-autores.php para tabela-autores.php no archive-autores e no taxonomy-autor_az.php
- arruma erro de undefined_index nas páginas de obras e autores single
- archive-autores.php
- archive-obras.php
- function.php
- js/wiki-ema.js
- search.php
- search-form.php
- taxonomy-autor_az.php
- taxonomy-nucleo.php
- taxonomy-obra_az.php
- template-parts/ambiente/content-obras-no-ambiente.php
- template-parts/autor/content-autor.php
- template-parts/autor/content-campos-clonaveis.php
- template-parts/obra/content-campos-clonaveis.php
- template-parts/obra/content-cartao-obra.oho
- template-parts/obra/content-resumo_autor.php


*** 
## `0.6`
### added
- taxonomy-obra_az.php

### changed
- archive-autor.php
- archive-obra.php
- estilos.php
- functions.php
- alphabetical pagination class
- content-lista-autor.php
- header-breadcruumb.php
- header-menu.php

***
## 0.5
### added
- inc/alphabetical-pagination/wp-bootstrap-alphabetical-pagination.php
- taxonomy-autor_az.php

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