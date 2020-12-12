/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2018
 */



Vue.component('auto-complete', {
	template: '<input type="text" class="form-control" v-bind:name="name" v-bind:value="value" v-bind:readonly="readonly" v-bind:required="required" v-bind:tabindex="tabindex" />',
	props: ['keys', 'name', 'value', 'readonly', 'required', 'tabindex'],

	methods: {
		create: function() {
			var instance = $(this.$el).autocomplete({
				source: this.keys || [],
				change: this.select,
				minLength: 0,
				delay: 0
			});

			this.instance = instance;
			this.instance.on('focus', function() {
				instance.autocomplete("search", "");
			});
		},

		destroy: function() {
			if(this.instance) {
				this.instance.off().autocomplete('destroy');
				this.instance = null;
			}
		},

		select: function(ev, ui) {
			this.$emit('input', $(ev.currentTarget).val(), ui.item);
		}
	},

	mounted: function() {
		if(!this.readonly) {
			this.create();
		}
	},

	beforeDestroy: function() {
		this.destroy();
	}
});



Vue.component('combo-box', {
	template: '\
		<select required class="template" v-bind:name="name" v-bind:readonly="readonly" v-bind:tabindex="tabindex">\
			<option v-bind:value="value">{{ label || value }}</option>\
		</select>\
	',
	props: ['index', 'name', 'value', 'label', 'readonly', 'tabindex', 'getfcn'],

	beforeDestroy: function() {
		this.destroy();
	},

	methods: {
		create: function() {
			this.instance = $(this.$el).combobox({
				getfcn: this.getfcn(this.index),
				select: this.select
			});
			return this.instance;
		},

		destroy: function() {
			if(this.instance) {
				this.instance.off().combobox('destroy');
				this.instance = null;
			}
			return this;
		},

		select: function(ev, ui) {
			this.$emit('select',  {index: this.index, value: ui.item[0].value, label: ui.item[0].label});
		}
	},

	mounted: function() {
		if(!this.readonly) {
			this.create();
		}
	},

	updated : function() {
		if(this.readonly && this.instance) {
			return this.destroy();
		}

		if(!this.readonly && !this.instance) {
			this.create().combobox('instance').input[0].value = this.label;
		}
	}
});



Vue.component('config-table', {
	props: {
		'index': {required: false, default: ''},
		'items': {type: Array, required: true},
		'readonly': {type: Boolean, default: true}
	},

	methods: {
		add: function() {
			let list = this.items;
			list.push({key: '', val: ''});
			this.$emit('update:config', list);
		},

		remove: function(idx) {
			let list = this.items;
			list.splice(idx, 1);
			this.$emit('update:config', list);
		}
	}
});



Vue.component('html-editor', {
	template: '\
		<textarea rows="6" class="form-control htmleditor" v-bind:id="id" v-bind:name="name" v-bind:value="value"\
			v-bind:placeholder="placeholder" v-bind:readonly="readonly" v-bind:tabindex="tabindex">\
		</textarea>',
	props: ['id', 'name', 'value', 'placeholder', 'readonly', 'tabindex'],

	beforeDestroy: function() {
		if(this.instance) {
			this.instance.destroy();
			this.instance = null;
		}
	},

	data: function() {
		return {
			instance: null,
			text: null
		};
	},

	methods: {
		change: function() {
			this.text = this.instance.getData();
			this.$emit('input', this.text);
		},
	},

	mounted: function() {
		this.instance = CKEDITOR.replace(this.id, {
			on: {
				instanceReady: function() {
					this.dataProcessor.writer.setRules( 'br', {
					indent: false,
					breakBeforeOpen: false,
					breakAfterOpen: false,
					breakBeforeClose: false,
					breakAfterClose: false
				});
					this.dataProcessor.writer.setRules( 'p', {
					indent: false,
					breakBeforeOpen: false,
					breakAfterOpen: false,
					breakBeforeClose: false,
					breakAfterClose: false
				});
				}
			},
			extraAllowedContent: Aimeos.editortags,
			toolbar: Aimeos.editorcfg,
			extraPlugins: Aimeos.editorExtraPlugins,
			initialData: this.value,
			readOnly: this.readonly,
			protectedSource: [/\n/g],
			autoParagraph: false,
			entities: false,
			removeButtons: Aimeos.editorRemoveButtons
		});
		this.instance.on('change', this.change);
	},

	watch: {
		value: function(val, oldval) {
			if(val !== oldval && val !== this.text ) {
				this.instance.setData(val);
			}
		}
	}
});



Vue.component('input-map', {
	template: '\
		<div> \
			<input type="hidden" v-bind:name="name" v-bind:value="JSON.stringify(value)" /> \
			<table class="config-table" > \
				<tr v-for="(entry, idx) in list" v-bind:key="idx" class="config-item"> \
					<td v-if="editable" class="config-item-key"> \
						<input v-on:input="update(idx, \'key\', $event.target.value)" v-bind:value="entry.key" v-bind:tabindex="tabindex" /> \
					</td> \
					<td v-else class="config-item-key">{{ entry.key }}</td> \
					<td v-if="editable" class="config-item-value"> \
						<input v-on:input="update(idx, \'val\', $event.target.value)" v-bind:value="toString(entry.val)" v-bind:tabindex="tabindex" /> \
					</td> \
					<td v-else class="config-item-value">{{ entry.val }}</td> \
					<td v-if="editable" class="action"> \
						<a v-on:click="remove(idx)" class="btn act-delete fa" href="#" v-bind:tabindex="tabindex"></a> \
					</td> \
				</tr> \
				<tr v-if="editable" class="config-item"> \
					<td></td> \
					<td></td> \
					<td class="action"> \
						<a v-on:click="add()" class="btn act-add fa" href="#" v-bind:tabindex="tabindex"></a> \
					</td> \
				</tr> \
			</table> \
		</div> \
	',

	props: {
		'name': {type: String, required: true},
		'value': {type: Object, required: true},
		'editable': {type: Boolean, default: false},
		'tabindex': {type: String, default: "0"}
	},

	data: function () {
		return {
			list: []
		}
	},

	created: function() {
		this.list = this.toList(this.value);
	},

	methods: {
		add: function() {
			this.list.push({key: '', val: ''});
		},

		remove: function(idx) {
			this.list.splice(idx, 1);
		},

		toList: function(obj) {
			let list = [];
			for(let key in obj) {
				list.push({"key": key, "val": obj[key]});
			}
			return list;
		},

		toObject: function(list) {
			let obj = {};
			for(let entry of list) {
				obj[entry.key] = entry.val;
			}
			return obj;
		},

		toString: function(value) {
			return typeof value === 'object' || typeof value === 'array' ? JSON.stringify(value) : value;
		},

		update: function(idx, key, val) {
			this.$set(this.list[idx], key, val);
			this.$emit('input', this.toObject(this.list));
		}
	},

	watch: {
		value: function() {
			this.list = this.toList(this.value);
		}
	}
});



Vue.component('list-view', {
	props: {
		'items': {type: Object, required: true},
		'all': {type: Boolean, required: false, default: true}
	},
	methods: {
		remove: function(url, label) {
			var dialog = $("#confirm-delete");

			$(".modal-footer .btn-danger").data("url", url);
			$(".modal-body ul.items", dialog).append($('<li>').text(label));

			dialog.modal("show");
		},

		removeAll: function(url, label) {
			var dialog = $("#confirm-delete");

			$(".modal-footer .btn-danger").data("url", url).data("multi", "1");
			$(".modal-body ul.items", dialog).append($('<li>').text(label));

			dialog.modal("show");
		},

		toggle: function(id) {
			this.items[id] = !this.items[id];
		},

		toggleAll: function() {
			this.all = !this.all;

			for(const key in this.items) {
				this.items[key] = this.all;
			};
		}
	}
});



Vue.component('nav-search', {
	props: {
		'state': {type: Boolean, required: false, default: false}
	},
	methods: {
		toggle: function () {
			this.state = !this.state;
		},
		toggleMobile: function () {
			document.body.classList.toggle('js--show-search');
		}
	}
});



Vue.component('page-limit', {
	template: '\
		<div class="page-limit btn-group dropup" role="group"> \
			<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" \
				v-bind:tabindex="tabindex" aria-haspopup="true" aria-expanded="false"> \
				{{ value }} <span class="caret"></span> \
			</button> \
			<ul class="dropdown-menu"> \
				<li class="dropdown-item"> \
					<a v-on:click.prevent="$emit(\'input\', 25)" href="#" v-bind:tabindex="tabindex">25</a> \
				</li> \
				<li class="dropdown-item"> \
					<a v-on:click.prevent="$emit(\'input\', 50)" href="#" v-bind:tabindex="tabindex">50</a> \
				</li> \
				<li class="dropdown-item"> \
					<a v-on:click.prevent="$emit(\'input\', 100)" href="#" v-bind:tabindex="tabindex">100</a> \
				</li> \
				<li class="dropdown-item"> \
					<a v-on:click.prevent="$emit(\'input\', 250)" href="#" v-bind:tabindex="tabindex">250</a> \
				</li> \
			</ul> \
		</div> \
	',
	props: {
		'value': {type: Number, required: true},
		'tabindex': {type: String, default: '0'}
	}
});



Vue.component('page-offset', {
	template: '\
		<ul class="page-offset pagination"> \
			<li v-bind:class="{disabled: first === null}" class="page-item"> \
				<button v-on:click.prevent="$emit(\'input\', first)" class="page-link" v-bind:tabindex="tabindex" aria-label="First"> \
					<span class="fa fa-fast-backward" aria-hidden="true"></span> \
				</button> \
			</li><li v-bind:class="{disabled: prev === null}" class="page-item"> \
				<button v-on:click.prevent="$emit(\'input\', prev)" class="page-link" v-bind:tabindex="tabindex" aria-label="Previous"> \
					<span class="fa fa-step-backward" aria-hidden="true"></span> \
				</button> \
			</li><li class="page-item disabled"> \
				<button class="page-link" v-bind:tabindex="tabindex""> \
					{{ string }} \
				</button> \
			</li><li v-bind:class="{disabled: next === null}" class="page-item"> \
				<button v-on:click.prevent="$emit(\'input\', next)" class="page-link" v-bind:tabindex="tabindex" aria-label="Next"> \
					<span class="fa fa-step-forward" aria-hidden="true"></span> \
				</button> \
			</li><li v-bind:class="{disabled: last === null}" class="page-item"> \
				<button v-on:click.prevent="$emit(\'input\', last)" class="page-link" v-bind:tabindex="tabindex" aria-label="Last"> \
					<span class="fa fa-fast-forward" aria-hidden="true"></span> \
				</button> \
			</li> \
		</ul> \
	',
	props: {
		'limit': {type: Number, required: true},
		'total': {type: Number, required: true},
		'value': {type: Number, required: true},
		'tabindex': {type: String, default: '0'},
		'text': {type: String, default: '%1$d / %2$d'}
	},

	computed: {
		first : function() {
			return this.value > 0 ? 0 : null;
		},
		prev : function() {
			return this.value - this.limit >= 0 ? this.value - this.limit : null;
		},
		next : function() {
			return this.value + this.limit < this.total ? this.value + this.limit : null;
		},
		last : function() {
			return Math.floor((this.total - 1) / this.limit) * this.limit > this.value ? Math.floor((this.total - 1) / this.limit ) * this.limit : null;
		},
		current : function() {
			return Math.floor( this.value / this.limit ) + 1;
		},
		pages : function() {
			return this.total != 0 ? Math.ceil(this.total / this.limit) : 1;
		},
		string: function() {
			return sprintf(this.text, this.current, this.pages);
		}
	}
});



Vue.component('property-table', {
	props: {
		'domain': {type: String, required: true},
		'index': {type: Number, default: 0},
		'items': {type: Array, required: true},
		'siteid': {type: String, required: true},
		'languages': {type: Object, required: true},
		'types': {type: Object, required: true}
	},

	methods: {
		add: function(data) {
			let entry = {};

			entry[this.domain + '.property.id'] = null;
			entry[this.domain + '.property.languageid'] = '';
			entry[this.domain + '.property.siteid'] = this.siteid;
			entry[this.domain + '.property.type'] = null;
			entry[this.domain + '.property.value'] = null;

			let list = this.items;
			list.push(Object.assign(entry, data));
			this.$emit('update:property', list);
		},

		readonly: function(idx) {
			return this.items[idx][this.domain + '.property.siteid'] != this.siteid;
		},

		remove: function(idx) {
			let list = this.items;
			list.splice(idx, 1);
			this.$emit('update:property', list);
		}
	}
});



Vue.component('taxrates', {
	template: '\
		<div> \
			<table> \
				<tr v-for="(val, type) in taxrates" v-bind:key="type"> \
					<td class="input-group"> \
						<input class="form-control item-taxrate" required="required" step="0.01" type="number" v-bind:placeholder="placeholder" \
							v-bind:readonly="readonly" v-bind:tabindex="tabindex" v-bind:name="name + \'[\' + type + \']\'" \
							v-bind:value="val" v-on:input="update(type, $event.target.value)" /> \
						<div v-if="type != 0" class="input-group-append"><span class="input-group-text">{{ type.toUpperCase() }}</span></div> \
					</td> \
					<td class="actions"> \
						<div v-if="!readonly && type == 0 && types.length" class="dropdown"> \
							<button class="btn act-add fa" v-bind:tabindex="tabindex" \
								type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> \
							</button> \
							<div class="dropdown-menu dropdown-menu-right"> \
								<a v-for="(rate, code) in types" class="dropdown-item" href="#" v-on:click="add(code, rate)">{{ code.toUpperCase() }}</a> \
							</div> \
						</div> \
						<div v-if="!readonly && type != 0" class="btn act-delete fa" v-on:click="remove(type)"></div> \
					</td> \
				</tr> \
			</table> \
		</div> \
	',
	props: ['name', 'placeholder', 'readonly', 'tabindex', 'taxrates', 'types'],

	created: function() {
		delete this.types[''];
	},

	methods: {
		add: function(type, val) {
			this.$set(this.taxrates, type, val);
		},

		remove: function(type) {
			this.$delete(this.taxrates, type);
		},

		update: function(type, val) {
			this.$set(this.taxrates, type, val);
		}
	}
});



Vue.component('select-component', {
	template: '\
		<select v-on:change="$emit(\'input\', $event.target.value)"> \
			<option v-if="text" value="">{{ text }}</option> \
			<option v-if="value && !items[value]" v-bind:value="value">{{ value }}</option> \
			<option v-if="all" v-bind:value="null" v-bind:selected="value === null">{{ all }}</option> \
			<option v-for="(label, key) in items" v-bind:key="key" v-bind:value="key" v-bind:selected="key === value"> \
				{{ label || key }} \
			</option> \
		</select> \
	',
	props: {
		'all': {type: String, required: false},
		'items': {type: Object, required: true},
		'text': {type: String, required: false, default: ''},
		'value': {required: true}
	}
});
