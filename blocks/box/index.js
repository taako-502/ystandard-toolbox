import { ystdtbConfig } from '@ystdtb/config/config';
import edit from './edit';
import save from './save';
import { Box } from 'react-feather';
import { attributes, supports } from './config';
import { registerBlockType } from '@wordpress/blocks';
import { __, _x } from '@wordpress/i18n';
import { mergeDefaultAttributes } from '@ystdtb/helper/attribute';

const blockName = 'ystdtb/box';
const blockAttributes = mergeDefaultAttributes( blockName, attributes );

registerBlockType( blockName, {
	apiVersion: 2,
	title: __( 'ボックス', 'ystandard-toolbox' ),
	description: __( '囲み枠ブロック', 'ystandard-toolbox' ),
	icon: (
		<Box
			stroke={ ystdtbConfig.color.iconForeground }
			style={ { fill: 'none' } }
		/>
	),
	keywords: [ _x( 'box', 'block-keywords', 'ystandard-toolbox' ), 'box' ],
	category: ystdtbConfig.category.common,
	attributes: blockAttributes,
	supports,
	edit,
	save,
	example: {},
} );
