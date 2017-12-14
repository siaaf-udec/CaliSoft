import es from 'vee-validate/dist/locale/es';
import VeeValidate, { Validator } from 'vee-validate';

export default {
	install(Vue) {
		Validator.localize('en', es);
		Vue.use(VeeValidate);
		Vue.prototype.setErrors = this.setErrors;
		Vue.prototype.safeExec = this.safeExec;
	},
	setErrors(errors){
		this.errors.clear();
		for(let field in errors) {
			for(let msg of errors[field]) {
				this.errors.add(field, msg)
			}
		}
	},
	safeExec(callback) {
		this.$validator.validateAll().then(res => res && callback());
	}

}