import React from 'react';
import { mount } from 'enzyme';
import Navbar from '../assets/js/components/Navbar';

describe('<Navbar />', () => {
  const noAuth = mount(<Navbar />);
  const auth = mount(<Navbar username="example"/>)

  it('renders three <div> in <Navbar />', () => {
    expect(noAuth.find('div')).toHaveLength(3);
  });

  it('renders home in <Navbar />', () => {
    expect(noAuth.text()).toContain('Home');
  });

  it('renders logout in <Navbar />', () => {
    expect(noAuth.text()).toContain('Login');
  });

  it('renders three <div> in <Navbar props={}/>', () => {
    expect(auth.find('div')).toHaveLength(3);
  });

  it('renders home in <Navbar props={}/>', () => {
    expect(auth.text()).toContain('Home');
  });

  it('renders create post in <Navbar props={}/>', () => {
    expect(auth.text()).toContain('Create Post');
  });

  it('renders logout in <Navbar props={}/>', () => {
    expect(auth.text()).toContain('Logout');
  });
});
