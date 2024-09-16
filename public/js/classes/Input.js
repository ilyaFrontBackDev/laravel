class Input {
    constructor({form, maxQuantity}) {
        this.form = form;
        this.maxQuantity = maxQuantity;
        if(!this.form) {
            return;
        }
        this.plus = this.form.querySelector('[data-form="plus"]');
        this.minus = this.form.querySelector('[data-form="minus"]');
        this.input = this.form.querySelector('[data-form="input"]');
    }

    init() {
        this._addEventListeners();
    }

    _addEventListeners() {
        this.plus?.addEventListener('click', this._onClickPlus.bind(this));
        this.minus?.addEventListener('click', this._onClickMinus.bind(this));
    }

    _onClickPlus() {
        if(this.input.value < this.maxQuantity) {
            this.input.value++;
        }
    }

    _onClickMinus() {
        if(this.input.value > 1) {
            this.input.value--;
        }
    }
}
