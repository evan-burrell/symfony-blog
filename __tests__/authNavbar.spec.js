import React from 'react';
import { mount } from 'enzyme';
import AuthNavbar from '../assets/js/components/AuthNavbar';

describe('<AuthNavbar />', () => {
  const wrapper = mount(<AuthNavbar username="example@example.com" />);

  it('renders three <div> in <NoAuthNavbar />', () => {
    expect(wrapper.find('div')).toHaveLength(3);
  });

  it('renders home in <NoAuthNavbar />', () => {
    expect(wrapper.text()).toContain('Home');
  });

  it('renders create post in <NoAuthNavbar />', () => {
    expect(wrapper.text()).toContain('Create Post');
  });

  it('renders logout in <NoAuthNavbar />', () => {
    expect(wrapper.text()).toContain('Logout');
  });

  it('renders the email property that is passed in', () => {
    expect(wrapper.prop('username')).toBe('example@example.com');
  });
});
