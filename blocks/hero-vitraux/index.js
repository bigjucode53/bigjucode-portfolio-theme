/**
 * Hero Vitraux Block
 */
import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import Save from './save';
import metadata from '../../../blocks/hero-vitraux/block.json';
import './style.css';

registerBlockType(metadata.name, {
    ...metadata,
    edit: Edit,
    save: Save,
});