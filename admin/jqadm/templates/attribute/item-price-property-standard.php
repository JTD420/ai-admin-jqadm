<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2019
 */


$enc = $this->encoder();


?>
<div v-show="advanced[idx]" class="col-xl-12 content-block secondary">

	<property-table inline-template
		v-bind:readonly="checkSite('price.siteid', idx) ? true : false"
		v-bind:siteid="'<?= $this->site()->siteid() ?>'"
		v-bind:items="getPropertyData(idx)"
		v-bind:domain="'price'"
		v-bind:index="idx" >

		<table class="item-price-property table table-default" >
			<thead>
				<tr>
					<th colspan="3">
						<span class="help"><?= $enc->html( $this->translate( 'admin', 'Price properties' ) ); ?></span>
						<div class="form-text text-muted help-text">
							<?= $enc->html( $this->translate( 'admin', 'Non-shared properties for the price item' ) ); ?>
						</div>
					</th>
					<th class="actions">
						<div class="btn act-add fa" tabindex="<?= $this->get( 'tabindex' ); ?>" v-on:click="add()"
							title="<?= $enc->attr( $this->translate( 'admin', 'Insert new entry (Ctrl+I)') ); ?>">
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(propdata, propidx) in list" v-bind:key="propidx" v-bind:class="readonly ? 'readonly' : ''">
					<td class="property-type">
						<input class="item-propertyid" type="hidden" v-bind:value="propdata['price.property.id']"
							v-bind:name="'<?= $enc->attr( $this->formparam( ['price', '_idx_', 'property', '_propidx_', 'price.property.id'] ) ); ?>'.replace('_idx_', index).replace('_propidx_', propidx)" />

						<select is="select-component" class="form-control custom-select item-type" required
							v-bind:items="JSON.parse('<?= $enc->attr( $this->map( $this->get( 'propertyTypes', [] ), 'price.property.type.code', 'price.property.type.label' )->toArray() ) ?>')"
							v-bind:name="'<?= $enc->attr( $this->formparam( ['price', '_idx_', 'property', '_propidx_', 'price.property.type'] ) ); ?>'.replace('_idx_', index).replace('_propidx_', propidx)"
							v-bind:text="'<?= $enc->html( $this->translate( 'admin', 'Please select' ) ); ?>'"
							v-bind:tabindex="'<?= $this->get( 'tabindex' ); ?>'"
							v-bind:readonly="readonly"
							v-bind:value="propdata['price.property.type']" >
						</select>
					</td>
					<td class="property-language">
						<select is="select-component" class="form-control custom-select item-type"
							v-bind:items="JSON.parse('<?= $enc->attr( $this->map( $this->get( 'pageLangItems', [] ), 'locale.language.code', 'locale.language.label' )->toArray() ) ?>')"
							v-bind:name="'<?= $enc->attr( $this->formparam( ['price', '_idx_', 'property', '_propidx_', 'price.property.languageid'] ) ); ?>'.replace('_idx_', index).replace('_propidx_', propidx)"
							v-bind:text="'<?= $enc->html( $this->translate( 'admin', 'All' ) ); ?>'"
							v-bind:tabindex="'<?= $this->get( 'tabindex' ); ?>'"
							v-bind:readonly="readonly"
							v-bind:value="propdata['price.property.languageid']" >
						</select>
					</td>
					<td class="property-value">
						<input class="form-control item-value" type="text" required="required" tabindex="<?= $this->get( 'tabindex' ); ?>"
							v-bind:name="'<?= $enc->attr( $this->formparam( ['price', '_idx_', 'property', '_propidx_', 'price.property.value'] ) ); ?>'.replace('_idx_', index).replace('_propidx_', propidx)"
							placeholder="<?= $enc->attr( $this->translate( 'admin', 'Property value (required)' ) ); ?>"
							v-bind:readonly="readonly"
							v-model="propdata['price.property.value']" >
					</td>
					<td class="actions">
						<div v-if="!readonly" class="btn act-delete fa" tabindex="<?= $this->get( 'tabindex' ); ?>"
							title="<?= $enc->attr( $this->translate( 'admin', 'Delete this entry') ); ?>" v-on:click.stop="remove(propidx)">
						</div>
					</td>
				</tr>
			</tbody>
		</table>

	</property-table>

	<?= $this->get( 'propertyBody' ); ?>

</div>
