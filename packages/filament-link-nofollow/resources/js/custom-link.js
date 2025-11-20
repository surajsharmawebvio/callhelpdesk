import { Link } from '@tiptap/extension-link'

export default Link.extend({
    addAttributes() {
        return {
            ...this.parent?.(),
            href: {
                default: null,
            },
            target: {
                default: this.options.HTMLAttributes.target,
            },
            rel: {
                default: null,
                parseHTML: element => element.getAttribute('rel'),
                renderHTML: attributes => {
                    if (!attributes.rel) {
                        return {}
                    }
                    return {
                        rel: attributes.rel,
                    }
                },
            },
        }
    },
})
