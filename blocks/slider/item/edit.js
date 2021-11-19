import classnames from 'classnames';
import {
	InnerBlocks,
	useBlockProps,
} from '@wordpress/block-editor';
import { blockClasses } from "./config";

const edit = () => {
	const blockProps = useBlockProps(
		{
			className: classnames(
				blockClasses.blockClass,
			),
		}
	);
	return (
		<div { ...blockProps }>
			<InnerBlocks/>
		</div>
	);
}
export default edit;
