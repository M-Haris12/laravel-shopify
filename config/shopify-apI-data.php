<?php return [
    'data_asset' => ['0' =>[
      'asset' => [ 
              "key" => "sections/original-collection-template.liquid", 
              "source_key" => "sections/collection-template.liquid"
      ]
  ],
  '1' =>[
      'asset' => [ 
          "key" => "snippets/original-product-card-grid.liquid", 
          "source_key" => "snippets/product-card-grid.liquid"
      ]
  ],
  '2' =>[
      'asset' => [ 
          "key" => "snippets/original-product-price.liquid", 
          "source_key" => "snippets/product-price.liquid"
      ]
  ],
  '3' =>[
      'asset' => [ 
          "key" => "sections/collection-template.liquid", 
          "value" => '{% comment %}
          this is the cutom file from price filter
          {% endcomment %}
          {% case section.settings.grid %}
            {% when 2 %}
              {%- assign max_height = 530 -%}
            {% when 3 %}
              {%- assign max_height = 345 -%}
            {% when 4 %}
              {%- assign max_height = 250 -%}
            {% when 5 %}
              {%- assign max_height = 195 -%}
          {% endcase %}
          
          {% if section.settings.layout == "grid" %}
            {%- assign limit = section.settings.grid | times: section.settings.rows -%}
          {% else %}
            {%- assign limit = 16 -%}
          {% endif %}
          
          {% paginate collection.products by limit %}
          
          <div data-section-id="{{ section.id }}" data-section-type="collection-template">
            <header class="collection-header page-width">
              {%- assign is_filter_by_available = false -%}
              {%- if section.settings.tags_enable and collection.all_tags.size > 0 -%}
                {%- assign is_filter_by_available = true -%}
              {%- endif -%}
          
              {%- assign is_vendor_or_type_collection = false -%}
              {%- if collection.current_type != blank or collection.current_vendor != blank -%}
                {%- assign is_vendor_or_type_collection = true -%}
              {%- endif -%}
          
              {% if section.settings.show_collection_image and collection.image %}
                <div class="collection-hero">
                  <div class="collection-hero__image ratio-container lazyload js"
                       data-bgset="{% include "bgset", image: collection.image %}"
                       data-sizes="auto"
                       data-parent-fit="cover"
                       style="background-image: url("{{ collection.image | img_url: "300x300" }});"></div>
                  <noscript>
                    <div class="collection-hero__image" style="background-image: url({{ collection.image | img_url: "2048x600", crop: "top" }});"></div>
                  </noscript>
                  <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">
                      <span role="text">
                        <span class="visually-hidden">{{ "collections.general.collection_label" | t }}: </span>
                        {{ collection.title }}
                      </span>
                    </h1>
                  </div>
                </div>
                {% if is_filter_by_available == false and section.settings.sort_enable == false %}
                  <div class="page-width">
                    <span class="filters-toolbar__product-count">{{ "collections.general.items_with_count" | t: count: collection.products_count }}</span>
                  </div>
                {% endif %}
                {% if collection.description != blank %}
                  <div class="rte collection-description page-width">
                    {{ collection.description }}
                  </div>
                {% endif %}
              {% else %}
                <div class="page-width">
                  <div class="section-header text-center">
          
                    {% assign pageType = "collection" %}
                    {% include "page-title-breadcrumb" %}
          
                    {% if collection.description != blank %}
                      <div class="rte">
                        {{ collection.description }}
                      </div>
                    {% endif %}
                    {% if is_filter_by_available == false and section.settings.sort_enable == false %}
                      <span class="filters-toolbar__product-count">{{ "collections.general.items_with_count" | t: count: collection.products_count }}</span>
                    {% endif %}
                  </div>
                </div>
              {% endif %}
          
              {% if is_filter_by_available or section.settings.sort_enable %}
                <div class="filters-toolbar-wrapper{% if is_filter_by_available %} filters-toolbar--has-filter{% endif %}">
                  <div class="page-width">
                    <div class="filters-toolbar">
                      <div class="filters-toolbar__item-wrapper">
          
                        {% if section.settings.sort_enable %}
                          <div class="filters-toolbar__item-child">
                            {%- assign sort_by = collection.sort_by | default: collection.default_sort_by -%}
                            <div class="filters-toolbar__input-wrapper select-group">
                              <select name="SortBy" id="SortBy" class="filters-toolbar__input hidden" aria-describedby="a11y-refresh-page-message">
                                <option value="manual"{% if sort_by == "manual" %} selected="selected"{% endif %}>{{ "collections.sorting.featured" | t }}</option>
                                <option value="best-selling"{% if sort_by == "best-selling" %} selected="selected"{% endif %}>{{ "collections.sorting.best_selling" | t }}</option>
                                <option value="title-ascending"{% if sort_by == "title-ascending"  %}selected="selected"{% endif %}>{{ "collections.sorting.az" | t }}</option>
                                <option value="title-descending"{% if sort_by == "title-descending" %} selected="selected"{% endif %}>{{ "collections.sorting.za" | t }}</option>
                                <option value="price-ascending"{% if sort_by == "price-ascending" %} selected="selected"{% endif %}>{{ "collections.sorting.price_ascending" | t }}</option>
                                <option value="price-descending"{% if sort_by == "price-descending" %} selected="selected"{% endif %}>{{ "collections.sorting.price_descending" | t }}</option>
                                <option value="created-descending"{% if sort_by == "created-descending" %} selected="selected"{% endif %}>{{ "collections.sorting.date_descending" | t }}</option>
                                <option value="created-ascending"{% if sort_by == "created-ascending" %} selected="selected"{% endif %}>{{ "collections.sorting.date_ascending" | t }}</option>
                              </select>
                              {% include "icon-chevron-down" %}
                            </div>
                            <input id="DefaultSortBy" type="hidden" value="{{ collection.default_sort_by }}">
                          </div>
                        {% endif %}
                      </div>
                    </div>
                  </div>
                </div>
              {% endif %}
            </header>
          
            <div class="grid page-width">
              <div class="side-nav grid__item medium-up--one-quarter">
          
          
                <div class="filter collection-menu">
                  <div class="filter-title">
                      <h2> {{ section.settings.text-categories }} </h2>
                  </div>
                  <div class="filter-list">
                    {% for collection in collections %}
                      <div class="collection-menu-item">
                        <a href="{{ shop.url }}/collections/{{collection.handle}}" title="view products in {{ collection.title }}">
                          <p>{{collection.title}}<span>({{ collection.products_count }})</span></p>
                        </a>
                      </div>
                    {% endfor %}
                  </div>
                </div>
          
                {% if section.settings.tags_enable and is_vendor_or_type_collection == false %}
                  <div class="filter tags-menu">
                    <div class="filter-title">
                        <h2> {{ section.settings.text-tags }} </h2>
                    </div>
                    <div class="filter-list">
                      <ul class="subnav clearfix">
                        <li {% unless current_tags %} class="active"{% endunless %}>
                          {% if collection.handle %}
                          <a href="/collections/{{ collection.handle }}{% if collection.sort_by %}?sort_by={{ collection.sort_by }}{% endif %}">All</a>
                          {% elsif collection.current_type %}
                          <a href="{{ collection.current_type | url_for_type | sort_by: collection.sort_by }}">All</a>
                          {% elsif collection.current_vendor %}
                          <a href="{{ collection.current_vendor | url_for_vendor | sort_by: collection.sort_by }}">All</a>
                          {% endif %}
                        </li>
                        {% for tag in collection.all_tags %}
                        {% if current_tags contains tag %}
                        <li class="active">
                          {{ tag | link_to_remove_tag: tag }}
                        </li>
                        {% else %}
                        <li>
                          {{ tag | link_to_tag: tag }}
                        </li>
                        {% endif %}
                        {% endfor %}
                      </ul>
                    </div>
                  </div>
                {% endif %}
          
          
              </div>
              
              <div class="grid__item medium-up--three-quarters" id="Collection">
                {% if section.settings.layout == "grid" %}
                  {% case section.settings.grid %}
                  {% when 2 %}
                    {%- assign grid_item_width = "medium-up--one-half" -%}
                  {% when 3 %}
                    {%- assign grid_item_width = "small--one-half medium-up--one-third" -%}
                  {% when 4 %}
                    {%- assign grid_item_width = "small--one-half medium-up--one-quarter" -%}
                  {% when 5 %}
                    {%- assign grid_item_width = "small--one-half medium-up--one-fifth" -%}
                  {% endcase %}
          
                  <ul class="grid grid--uniform{% if collection.products_count > 0 %} grid--view-items{% endif %}">
                    {% for product in collection.products %}
                      {% for option in product.options %}
                            {% assign opt= option | upcase %}          
                            {% if opt == "SIZE" %}
                              {% assign index= forloop.index %}  
                            {% endif %}
                        {% endfor %}
                      <li class="grid__item grid__item--{{section.id}} {{ grid_item_width }} js-size-filter {% for variant in product.variants %}{% if variant.available %}size-{% if index == 1 %}{{ variant.title | split: "/" | first  }}{% else %}{{ variant.title | split: "/" | last | lstrip | append: " " }}{% endif %}{% endif %}{% endfor %}">
                        {% include "product-card-grid", max_height: max_height %}
                      </li>
                    {% else %}
                      {% comment %}
                      Add default products to help with onboarding for collections/all only.
          
                      The onboarding styles and products are only loaded if the
                      store has no products.
                      {% endcomment %}
                      {% if collection.handle == "all" and collection.all_vendors.size == 0 and collection.all_types.size == 0 %}
                        <li class="grid__item">
                          <div class="grid grid--uniform">
                            {% for i in (1..limit) %}
                              <div class="grid__item {{ grid_item_width }}">
                                <div class="grid-view-item">
                                  <a href="#" class="grid-view-item__link">
                                    <div class="grid-view-item__image">
                                      {% capture current %}{% cycle 1, 2, 3, 4, 5, 6 %}{% endcapture %}
                                      {{ "product-" | append: current | placeholder_svg_tag: "placeholder-svg" }}
                                    </div>
                                    <div class="h4 grid-view-item__title">{{ "homepage.onboarding.product_title" | t }}</div>
                                    <div class="grid-view-item__meta">
                                      <span class="product-price__price">$19.99</span>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            {% endfor %}
                          </div>
                        </li>
                      {% else %}
                        {%- assign is_empty_collection = true -%}
                      {% endif %}
                    {% endfor %}
                  </ul>
                {% else %}
                  <ul class="list-view-items">
                    {% for product in collection.products %}
                      <li class="list-view-item">
                        {% include "product-card-list", product: product %}
                      </li>
                    {% else %}
          
                      {% comment %}
                      Add default products to help with onboarding for collections/all only.
          
                      The onboarding styles and products are only loaded if the
                      store has no products.
                      {% endcomment %}
                      {% if collection.handle == "all" and collection.all_vendors.size == 0 and collection.all_types.size == 0%}
                        {% for i in (1..4) %}
                          <li class="list-view-item">
                            <a href="#" class="list-view-item__link">
                              <div class="list-view-item__image-column">
                                <div class="list-view-item__image-wrapper">
                                  <div class="list-view-item__image">
                                    {% capture current %}{% cycle 1, 2, 3, 4 %}{% endcapture %}
                                    {{ "product-" | append: current | placeholder_svg_tag: "placeholder-svg" }}
                                  </div>
                                </div>
                              </div>
          
                              <div class="list-view-item__title-column">
                                <div class="list-view-item__title">{{ "homepage.onboarding.product_title" | t }}</div>
                              </div>
          
                              <div class="list-view-item__price-column">
                                <span class="product-price__price">$19.99</span>
                              </div>
                            </a>
                          </li>
                        {% endfor %}
                      {% else %}
                        {%- assign is_empty_collection = true -%}
                      {% endif %}
                    {% endfor %}
                  </ul>
                {% endif %}
          
                {% if is_empty_collection %}
                  <div class="grid__item small--text-center">
                    <p class="text-center">{{ "collections.general.no_matches" | t }}</p>
                  </div>
                {% endif %}
          
                {% if paginate.pages > 1 %}
                  {% include "pagination" %}
                {% endif %}
              </div>
            </div>
          
          </div>
          
          {% endpaginate %}
          
          
          
          {% schema %}
          {
            "name": {
              "de": "Kategorie-Seiten",
              "en": "Collection pages",
              "es": "Páginas de colección",
              "fr": "Pages de collections",
              "it": "Pagine delle collezioni",
              "ja": "コレクションページ",
              "pt-BR": "Páginas de coleções"
            },
            "settings": [
              {
                "type": "select",
                "id": "layout",
                "label": {
                  "de": "Layout",
                  "en": "Layout",
                  "es": "Diseño",
                  "fr": "Mise en page",
                  "it": "Layout",
                  "ja": "レイアウト",
                  "pt-BR": "Layout"
                },
                "default": "grid",
                "options": [
                  {
                    "value": "grid",
                    "label": {
                      "de": "Raster",
                      "en": "Grid",
                      "es": "Cuadrícula",
                      "fr": "Grille",
                      "it": "Griglia",
                      "ja": "グリッド",
                      "pt-BR": "Grade"
                    }
                  },
                  {
                    "value": "list",
                    "label": {
                      "de": "Liste",
                      "en": "List",
                      "es": "Lista",
                      "fr": "Liste",
                      "it": "Elenco",
                      "ja": "リスト",
                      "pt-BR": "Lista"
                    }
                  }
                ]
              },
              {
                "id": "text-categories",
                "type": "text",
                "label": "Category Filter",
                "default": "Categories"
              },
              {
                "id": "text-tags",
                "type": "text",
                "label": "Tag Filter",
                "default": "Tags"
              },
              {
                "type": "range",
                "id": "grid",
                "label": {
                  "de": "Produkte per Reihe (nur Raster)",
                  "en": "Products per row (grid only)",
                  "es": "Productos por fila (solo cuadrícula)",
                  "fr": "Produits par rangée (grille uniquement)",
                  "it": "Prodotti per riga (solo griglia)",
                  "ja": "行あたりの商品数（グリッドのみ）",
                  "pt-BR": "Produtos por linha (somente grade)"
                },
                "default": 4,
                "min": 2,
                "max": 5,
                "step": 1
              },
              {
                "type": "range",
                "id": "rows",
                "label": {
                  "de": "Reihen per Seite (nur Raster)",
                  "en": "Rows per page (grid only)",
                  "es": "Filas por página (solo cuadrícula)",
                  "fr": "Rangées par page (grille uniquement)",
                  "it": "Righe per pagina (solo griglia)",
                  "ja": "ページあたりの行数（グリッドのみ）",
                  "pt-BR": "Linhas por página (somente grade)"
                },
                "default": 2,
                "min": 2,
                "max": 8,
                "step": 1
              },
              {
                "type": "checkbox",
                "id": "show_collection_image",
                "label": {
                  "de": "Kategorie-Foto anzeigen",
                  "en": "Show collection image",
                  "es": "Mostrar imagen de la colección",
                  "fr": "Afficher limage de la collection",
                  "it": "Mostra immagine collezione",
                  "ja": "コレクションの画像を表示する",
                  "pt-BR": "Exibir imagem da coleção"
                },
                "default": true
              },
              {
                "type": "checkbox",
                "id": "show_vendor",
                "label": {
                  "de": "Produkt-Lieferanten anzeigen",
                  "en": "Show product vendors",
                  "es": "Mostrar proveedores del producto",
                  "fr": "Afficher les vendeurs",
                  "it": "Mostra fornitori prodotto",
                  "ja": "商品の販売元を表示する",
                  "pt-BR": "Exibir fornecedores do produto"
                },
                "default": false
              },
              {
                "type": "checkbox",
                "id": "sort_enable",
                "label": {
                  "de": "Sortieren erlauben",
                  "en": "Enable sorting",
                  "es": "Habilitar la función ordenar",
                  "fr": "Activer le tri",
                  "it": "Permetti di ordinare",
                  "ja": "並べ替えを有効にする",
                  "pt-BR": "Ativar classificação"
                },
                "default": true
              },
              {
                "type": "checkbox",
                "id": "tags_enable",
                "label": {
                  "de": "Tag-Filtern erlauben",
                  "en": "Enable tag filtering",
                  "es": "Habilitar filtro de etiquetas",
                  "fr": "Activer le filtrage par balises",
                  "it": "Attiva filtro tag",
                  "ja": "タグでの絞り込みを有効にする",
                  "pt-BR": "Ativar filtragem de tags"
                },
                "default": true
              }
            ]
          }
          {% endschema %}
          
          
          '
      ]
  ],
  '4' =>[
      'asset' => [ 
          "key" => "snippets/product-card-grid.liquid", 
          "value" => '<div class="grid-view-item{% unless product.available %} grid-view-item--sold-out{% endunless %} product-card">
          <a class="grid-view-item__link grid-view-item__image-container full-width-link" href="{{ product.url | within: collection }}">
            <span class="visually-hidden">{{ product.title }}</span>
          </a>
        
          {% capture img_id %}ProductCardImage-{{ section.id }}-{{ product.id }}{% endcapture %}
          {% capture wrapper_id %}ProductCardImageWrapper-{{ section.id }}-{{ product.id }}{% endcapture %}
          {%- assign img_url = product.featured_image | img_url: "1x1" | replace: "_1x1.", "_{width}x." -%}
        
          {% unless product.featured_image == blank %}
            {% include "image-style" with image: product.featured_image, width: max_height, height: max_height, small_style: true, wrapper_id: wrapper_id, img_id: img_id %}
          {% endunless %}
        
          <div id="{{ wrapper_id }}" class="grid-view-item__image-wrapper product-card__image-wrapper js">
            <div style="padding-top:{% unless product.featured_image == blank %}{{ 1 | divided_by: product.featured_image.aspect_ratio | times: 100}}%{% else %}100%{% endunless %};">
              <img id="{{ img_id }}"
                    class="grid-view-item__image lazyload"
                    src="{{ product.featured_image | img_url: "300x300" }}"
                    data-src="{{ img_url }}"
                    data-widths="[180, 360, 540, 720, 900, 1080, 1296, 1512, 1728, 2048]"
                    data-aspectratio="{{ product.featured_image.aspect_ratio }}"
                    data-sizes="auto"
                    alt="">
            </div>
          </div>
        
          <noscript>
            {% capture image_size %}{{ max_height }}x{{ max_height }}{% endcapture %}
            <img class="grid-view-item__image" src="{{ product.featured_image.src | img_url: image_size, scale: 2 }}" alt="{{ product.featured_image.alt }}" style="max-width: {{ max_height | times: product.featured_image.aspect_ratio }}px;">
          </noscript>
        
          <div class="h4 grid-view-item__title product-card__title" aria-hidden="true">{{ product.title }}</div>
        
          {% include "product-price", variant: product %}
        
        </div>
        '
      ]
  ],
  '5' =>[
      'asset' => [ 
          "key" => "snippets/product-price.liquid", 
          "value" => '<!-- snippet/product-price.liquid -->

          {% if variant.title %}
          {%- assign compare_at_price = variant.compare_at_price -%}
          {%- assign price = variant.price -%}
          {%- assign available = variant.available -%}
          {% else %}
          {%- assign compare_at_price = 1999 -%}
          {%- assign price = 1999 -%}
          {%- assign available = true -%}
          {% endif %}
          
          {%- assign money_price = price | money -%}
          
          <dl class="price{% if compare_at_price > price %} price--on-sale{% endif %}" data-price>
          
          {% if section.settings.show_vendor %}
          <div class="price__vendor">
          <dt>
          <span class="visually-hidden">{{ "products.product.vendor" | t }}</span>
          </dt>
          <dd>
          {{ product.vendor }}
          </dd>
          </div>
          {% endif %}
          
          <div class="price__regular">
          <dt>
          <span class="visually-hidden visually-hidden--inline">{{ "products.product.regular_price" | t }}</span>
          </dt>
          <dd>
          <span class="nxb-exvat price-item price-item--regular" data-regular-price>
          {% if available %}
          {% if compare_at_price > price %}
          Exc-Vat {{ compare_at_price | money }}
          {% else %}
          Exc-Vat {{ money_price }}
          {% endif %}
          {% else %}
          {{ "products.product.sold_out" | t }}
          {% endif %}
          </span>
          
          <span style="display:none;" class="nxb-invat price-item price-item--regular" data-sale-price>
          
          {% if available %}
          {% if compare_at_price > price %}
          
          {% assign price = compare_at_price | money_without_currency | strip_html | times: shop.metafields.commerce_plugin.vat %}
          {% assign render = compare_at_price | money_without_currency | strip_html | plus: price %}
          Inc-Vat {{ "Rs." | append: render }} 
          {% else %}
          
          {% assign price = product.price | money_without_currency | strip_html | times: shop.metafields.commerce_plugin.vat %}
          {% assign render = product.price | money_without_currency | strip_html | plus: price %}
          Inc-Vat {{ "Rs." | append: render }}
          {% endif %}
          {% else %}
          {{ "products.product.sold_out" | t }}
          {% endif %}
          
          
          
          
          </span>
          
          </dd>
          </div>
          <div class="price__sale">
          <dt>
          <span class="visually-hidden visually-hidden--inline">{{ "products.product.sale_price" | t }}</span>
          </dt>
          <dd>
          <span class="nxb-exvat price-item price-item--sale" data-sale-price>
          Exc-Vat {{ money_price }}
          </span>
          
          <span style="display:none;" class="nxb-invat price-item price-item--sale " data-sale-price>
          
          {% assign price = product.price | money_without_currency | strip_html | times: shop.metafields.commerce_plugin.vat %}
          {% assign render = product.price | money_without_currency | strip_html | plus: price %}
          Inc-Vat {{ "Rs." | append: render }} 
          
          </span> 
          
          <span class="price-item__label" aria-hidden="true">{{ "products.product.on_sale" | t }}</span>
          </dd>
          </div>
          </dl>' 
      ]
  ]     

],

  'data_script' => ['script_tag' => [
    'event' => "onload",
    'src' => "https://950ff3bd.ngrok.io/js/product-filter.js"
  
  ]
],
  'data_hooks' => [ '0' =>  ['webhook' => [
                        'topic' => "products/create",
                        'address' => "https://950ff3bd.ngrok.io/share/create",
                        'format'=>"json"
                      
                      ]
                  ],
                    
                   '1' =>  ['webhook' => [
                      'topic' => "products/update",
                      'address' => "https://950ff3bd.ngrok.io/share/update",
                      'format'=>"json"
                    
                    ]
                ],
                  '2' =>  ['webhook' => [
                      'topic' => "products/delete",
                      'address' => "https://950ff3bd.ngrok.io/share/delete",
                      'format'=>"json"
                    
                    ]
                ]      

  ] 


];