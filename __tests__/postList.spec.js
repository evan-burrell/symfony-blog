import React from 'react';
import { mount } from 'enzyme';
import PostList from '../assets/js/components/PostList';

describe('<PostList />', () => {
    it('renders', () => {
        const wrapper = mount(<PostList />);
        expect(wrapper.find('PostList')).toHaveLength(1);
    });
});

// Hooks not being stable makes it so that I cannot shallow mount the component
